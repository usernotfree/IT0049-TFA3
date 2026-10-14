<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Customers extends BaseController
{
    private CustomerModel $customers;

    public function __construct()
    {
        $this->customers = new CustomerModel();
    }

    public function index(): string
    {
        return view('customers/index', [
            'customers' => $this->customers->orderBy('full_name', 'ASC')->findAll(),
        ]);
    }

    public function new(): string
    {
        return view('customers/new');
    }

    public function create()
    {
        if (! $this->validateData($this->request->getPost(), $this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->customers->insert([
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'city'       => trim((string) $this->request->getPost('city')),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer account created successfully.');
    }

    public function edit(int $id): string
    {
        return view('customers/edit', [
            'customer' => $this->findCustomer($id),
        ]);
    }

    public function update(int $id)
    {
        $this->findCustomer($id);

        if (! $this->validateData($this->request->getPost(), $this->rules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->customers->update($id, [
            'full_name' => trim((string) $this->request->getPost('full_name')),
            'email'      => trim((string) $this->request->getPost('email')),
            'city'       => trim((string) $this->request->getPost('city')),
        ]);

        return redirect()->to(site_url('customers'))->with('success', 'Customer account updated successfully.');
    }

    private function rules(): array
    {
        return [
            'full_name' => [
                'label' => 'Full name',
                'rules' => 'required|max_length[100]',
            ],
            'email' => [
                'label' => 'Email address',
                'rules' => 'required|valid_email|max_length[100]',
            ],
            'city' => [
                'label' => 'City',
                'rules' => 'permit_empty|max_length[100]',
            ],
        ];
    }

    private function findCustomer(int $id): array
    {
        $customer = $this->customers->find($id);

        if ($customer === null) {
            throw PageNotFoundException::forPageNotFound('Customer account not found.');
        }

        return $customer;
    }
}
