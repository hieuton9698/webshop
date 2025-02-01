@extends('admin_layout')

@section('admin_content')
<div class="container-fluid p-4">
        <div class="d-flex justify-content-between">
          <h3 class="mb-4">Danh sách danh mục</h3>
          <div>
            <a href="#" class="btn btn-outline-success rounded-0">Manage Categories</a>
            <a href="{{ URL::to('/add-category-product') }}" class="btn btn-primary rounded-0">Add Product</a>
          </div>
        </div>

        
        <div class="card rounded-0 border-0 shadow-sm">
          <div class="card-body">
            <table class="table text-center">
              <thead>
                <tr>
                  <th class="text-start" colspan="2">Dah mục</th>
                  <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">', $message, '</span>';
                Session::put('message', null);
            }
            ?>
                  <th>Hoạt động</th>
                </tr>
              </thead>
              <tbody class="align-middle">
              @foreach($all_category_product as $category)
    <tr>
        <td class="text-start">
            <strong>{{ $category->category_name }}</strong>
            <br>
            <small>
                Số lượng: <a href="#" class="text-decoration-none fw-bold">{{ $category->category_desc }}</a>
            </small>
        </td>
        <td>
            @if($category->category_status == 1)
                Active
            @else
                Inactive
            @endif
        </td>
        <td>
            <a href="#" target="_blank" class="btn btn-primary btn-sm">
                <i class="fas fa-eye fa-fw"></i>
            </a>
            <a href="{{ URL::to('/edit-category-product/'.$category->category_id) }}" class="btn btn-outline-warning btn-sm">
                <i class="fas fa-pencil fa-fw"></i>
            </a>
            <a onclick="return confirm('Có tính xóa thiệt không cha?')" href="{{ URL::to('/delete-category-product/'.$category->category_id) }}" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-times fa-fw"></i>
            </a>
        </td>
    </tr>
@endforeach

                </tbody>
            </table>
          </div>
        </div>
          
    </div>
  </div>
  <script type="text/javascript" src="assets/js/google.chart.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Sales', 'Expenses'],
        ['2004',  1000,      400],
        ['2005',  1170,      460],
        ['2006',  660,       1120],
        ['2007',  1030,      540]
      ]);

      var options = {
        title: 'Company Performance',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
    }
  </script>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
@endsection
