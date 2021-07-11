<script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
    {{ $index=0 }}
    @foreach ($data as $nama=>$krit)
    {{ ++$index }}
    Highcharts.chart('chartrekomendasi', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'Rekomendasi Pemain'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: {!!json_encode($nama_alt)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Prefernsi'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.4f} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Nilai Preferensi',
            data:{!! json_encode($v_akhir) !!}
        }]
    });
    @endforeach
    </script>
