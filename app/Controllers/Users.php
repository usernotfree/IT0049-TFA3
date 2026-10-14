<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use Throwable;

class Users extends BaseController
{
    private UserModel $users;

    public function __construct()
    {
        $this->users = new UserModel();
    }

    public function index(): string
    {
        return view('users/index', [
            'users' => $this->users->orderBy('full_name', 'ASC')->findAll(),
        ]);
    }

    public function new(): string
    {
        return view('users/new');
    }

    public function create()
    {
        $data = $this->request->getPost();

        if (! $this->validateData($data, $this->userRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->users->insert([
            'username'   => trim((string) $this->request->getPost('username')),
            'full_name'  => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'))->with('success', 'User account created successfully.');
    }

    public function edit(int $id): string
    {
        return view('users/edit', [
            'user' => $this->findUser($id),
        ]);
    }

    public function update(int $id)
    {
        $user = $this->findUser($id);
        $data = $this->request->getPost();
        $data['id'] = $id;

        if (! $this->validateData($data, $this->userRules($id))) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $avatar = $this->request->getFile('avatar');
        $avatarName = $user['avatar'];

        if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
            if (! $this->validateData([], [
                'avatar' => [
                    'label' => 'Profile picture',
                    'rules' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]',
                    'errors' => [
                        'uploaded' => 'Please choose a profile picture to upload.',
                        'is_image' => 'The profile picture must be a valid image.',
                        'mime_in'  => 'The profile picture must be a JPG or PNG file.',
                        'max_size' => 'The profile picture must not exceed 2 MB.',
                    ],
                ],
            ])) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            try {
                $avatarName = $this->prepareAvatar($avatar->getTempName(), $avatar->getMimeType());
            } catch (Throwable $exception) {
                log_message('error', 'Avatar preparation failed: {message}', ['message' => $exception->getMessage()]);

                return redirect()->back()->withInput()->with('errors', [
                    'avatar' => 'The profile picture could not be prepared. Please try another image.',
                ]);
            }
        }

        $this->users->update($id, [
            'username'  => trim((string) $this->request->getPost('username')),
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'     => trim((string) $this->request->getPost('email')),
            'avatar'    => $avatarName,
        ]);

        return redirect()->to(site_url('users'))->with('success', 'User account updated successfully.');
    }

    private function userRules(?int $id = null): array
    {
        $usernameRule = 'required|min_length[3]|max_length[50]|alpha_numeric_punct';
        $usernameRule .= $id === null
            ? '|is_unique[users.username]'
            : '|is_unique[users.username,id,{id}]';

        return [
            'id' => [
                'label' => 'User ID',
                'rules' => $id === null ? 'permit_empty' : 'required|is_natural_no_zero',
            ],
            'username' => [
                'label' => 'Username',
                'rules' => $usernameRule,
                'errors' => [
                    'is_unique' => 'That username is already in use.',
                ],
            ],
            'full_name' => [
                'label' => 'Full name',
                'rules' => 'required|max_length[100]',
            ],
            'email' => [
                'label' => 'Email address',
                'rules' => 'permit_empty|valid_email|max_length[100]',
            ],
        ];
    }

    private function findUser(int $id): array
    {
        $user = $this->users->find($id);

        if ($user === null) {
            throw PageNotFoundException::forPageNotFound('User account not found.');
        }

        return $user;
    }

    private function prepareAvatar(string $temporaryPath, string $mimeType): string
    {
        $extension = $mimeType === 'image/png' ? 'png' : 'jpg';
        $filename = bin2hex(random_bytes(16)) . '.' . $extension;
        $uploadDirectory = FCPATH . 'uploads' . DIRECTORY_SEPARATOR . 'avatars';

        if (! is_dir($uploadDirectory) && ! mkdir($uploadDirectory, 0755, true) && ! is_dir($uploadDirectory)) {
            throw new \RuntimeException('Unable to create the avatar upload directory.');
        }

        $saved = service('image')
            ->withFile($temporaryPath)
            ->fit(300, 300, 'center')
            ->save($uploadDirectory . DIRECTORY_SEPARATOR . $filename, 85);

        if (! $saved) {
            throw new \RuntimeException('The image service could not save the prepared avatar.');
        }

        return $filename;
    }
}
