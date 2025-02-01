@extends('admin_layout')
@section('admin_content')
<h3 class="mb-4">Dashboard</h3>



<div class="row">
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-primary-subtle text-primary">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-file-invoice-dollar"></i>
                  122
                </div>
                ORDERS
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-warning-subtle text-warning">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-boxes"></i>
                  20
                </div>
                Quản Lý danh mục
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-danger-subtle text-danger">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-users"></i>
                  10,003
                </div>
                CUSTOMERS
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-4">
            <div class="card border-0 rounded-0 bg-success-subtle text-success">
              <div class="card-body text-end">
                <div class="display-6 d-flex justify-content-between">
                  <i class="fal fa-chart-line"></i>
                  1.5 B
                </div>
                INCOMES
              </div>
            </div>
          </div>
        </div>
@endsection