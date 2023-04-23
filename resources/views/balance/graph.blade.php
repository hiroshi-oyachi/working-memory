@extends('layouts.admin')
@section('title', '収益表')

@section('content')
    <div class='container'>
        <div class='row'>
            <h2>収益表</h2>
        </div>
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            表示する年
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
         @for($i=$startyear; $i<=$year; $i++) 
              <li><a class="dropdown-item" href="#">{{ $i }}</a></li>
         @endfor
         </ul>
        </div>
        <div>
          <canvas id="myChart"></canvas>
        </div>
    </div>
    <script>
        (function ($) {
         $(function () {
          $.ajax({
          url: '/balance/year/2023',
          type: 'GET',
          dataType: "json",
          }).done(function (data) {
          console.log(data);
            console.log(data.income);
          var ctx = document.getElementById('myChart');
           var myChart = new Chart(ctx, {
            type: 'bar',
              data: {
              labels: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
              datasets: [{
              label: '収支',
              data: data.income,
              backgroundColor: '#00f',
              }, {
              label: '支出',
              data: data.expense,
              backgroundColor: '#f00',
              }],
            },
          });
    }).fail(function (data) {
      // error
      console.log('error');
    });
  });
})(jQuery);
            </script>
@endsection
