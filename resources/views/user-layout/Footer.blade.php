<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"> </script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

@if(Session::get('userrole') == 'Manager')
@php
$options= App\Models\Useraccess::where('user_id',Session::get('userloginid'))->get()->pluck('options')->toArray();
if($options){
$opt= $options[0];
}
@endphp
<script>
    $(document).ready(function() {
        var myArray = '<?php echo @$opt; ?>';
        var jsonArr = $.parseJSON(myArray);
        $.each(jsonArr, function(index, value) {
            $(".man a:contains('" + value + "')").closest(".nav-item").show();
        });
    });
</script>
@endif

<script>
    $(function() {
        $(".datepicker").datepicker({
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });
    });
</script>
<script>
    $(function() {
        $(".datepickerr").datepicker({
            format: "mm-yyyy",
            startView: "months",
            minViewMode: "months"
        });
    });
</script>
<script>
    $(document).ready(function() {
        var table = $('#table-loc').DataTable({
            responsive: true,
            "bLengthChange": false,
            "bPaginate": false,
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#detail').DataTable({
            searching: false,
            paging: true,
        });
    });
    $('#data_cat').on('change', function() {
        $('#submitopt').submit();
    });
    if ($('.msgtxt').length > 0) {
        $('.companydata').hide();
    }
    if ($('.ermsgtxt').length > 0) {
        $('.stats').hide();
    }
    if ($('.errmsgtxt').length > 0) {
        $('.customergh').hide();
    }
</script>
<script src="{{URL::asset('public/asset/assets/js/plugins/chartjs.min.js')}}"></script>
<script>
    $('#location').on('change', function() {
        var selecteddate = $("#date").val();
        var location = $("#location").val();
        if (selecteddate) {
            $('#submit').click();
        }
    });
    $('#date').on('change', function() {
        var selecteddate = $("#location").val();
        if (selecteddate) {
            $('#submit').click();
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#customertable').DataTable({
            "bLengthChange": false,
            "bPaginate": true,
            scrollX: true,
            scrollY: true,
            info: false,
            "searching": false,
        });
    });
    $(document).ready(function() {
        $('#deliverytbl').DataTable({
            "bLengthChange": false,
            "bPaginate": true,
            scrollX: true,
            scrollY: true,
            info: false,
            "searching": false,
        });
    });
    $('#incometable').DataTable({
        "bLengthChange": false,
        "bPaginate": true,
        info: false,
        "searching": false,
        'columnDefs': [{
            'targets': [0],
            'orderable': false,
        }],
        "orderCellsTop": true
    });
    $('#stats_cat').on('change', function() {
        $('#stats_option').submit();
    });
    $('#cust_cat').on('change', function() {
        $('#cust_option').submit();
    });
    $('#cogs_cat').on('change', function() {
        $('#cogs_option').submit();
    });
    $('#gros_cat').on('change', function() {
        $('#gros_option').submit();
    });
    $('#exp_cat').on('change', function() {
        $('#exp_option').submit();
    });
    $('#net_cat').on('change', function() {
        $('#net_option').submit();
    });
</script>
<script>
    $('#loc').on('change', function() {
        var selecteddate = $("#datee").val();
        var location = $("#loc").val();
        if (selecteddate) {
            $('#sbmit').click();
        }
    });
    $('#datee').on('change', function() {
        var selecteddate = $("#loc").val();
        if (selecteddate) {
            $('#sbmit').click();
        }
    });
</script>
<script>
    $(document).ready(function() {
        var a = $("#abc").val();
        if (a) {
            $("#loc").val(a);
        }
    });
</script>
<script>
    $('#dates').on('change', function() {
        var selecteddate = $("#dates").val();
        var url = "{{url('user/crrentdata')}}";
        var token = '{{ csrf_token() }}';
        $.ajax({
            url: url,
            data: {
                date: selecteddate,
                _token: token,
            },
            type: 'POST',
            success: function(data) {
                $('#table-loc tbody').empty();
                var datas = $.parseJSON(data);
                if (datas[2].length == 0) {
                    for (var i = 0; i < datas[0].length; i++) {
                        var tr_str = `<tr> 
                   <td align='center'>${datas[1][i]}</td>
                   <td align='center'>0</td> 
                   <td align='center'>0</td>
                   <td align='center'>${datas[0][i]}</td>
                   <td align='center'>0</td>
                 </tr>`;
                        $('#table-loc tbody').append(tr_str);
                    }
                } else {
                    for (var i = 0; i < datas[0].length; i++) {
                        $('.currdate').html(datas[4]);
                        var tr_str = `<tr> 
                   <td align='center'>${datas[1][i]}</td>
                   <td align='center'>${datas[2][i]}</td> 
                   <td align='center'>${datas[2][i] - datas[3][i]}</td>
                   <td align='center'>${datas[0][i]}</td>
                   <td align='center'>${datas[2][i] - datas[0][i]}</td>
                 </tr>`;
                        $('#table-loc tbody').append(tr_str);
                    }
                }
            }
        });
    });
</script>
<script>
    $('#ytd').on('click', function() {
        var checked = $('#ytd').is(':checked');
        var selecteddate = $("#date").val();
        var selectedlocation = $("#location").val();
        if (checked) {
            var selecteddate = $("#date").val();
            var selectedlocation = $("#location").val();
            var url = "{{url('/ytdate')}}";
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: url,
                data: {
                    date: selecteddate,
                    location: selectedlocation,
                    _token: token,
                },
                type: 'POST',
                success: function(data) {
                    var datas = $.parseJSON(data);
                    // -------------------Current year
                    var rev = '<td >' + datas['currentyear'][0].toLocaleString('en-US') + '</td>';
                    var cog = '<td style="border-bottom: 1px solid #000;">' + datas['currentyear'][1]
                        .toLocaleString('en-US') + '</td>';
                    var gross = '<td>' + datas['currentyear'][2].toLocaleString('en-US') + '</td>';
                    var expense = '<td style="border-bottom: 1px solid #000;">' + datas['currentyear'][
                        3
                    ].toLocaleString('en-US') + '</td>';
                    var netincome = '<td style="border-bottom: 1px solid #000;">' + datas['currentyear']
                        [4].toLocaleString('en-US') + '</td>';
                    $('.revsum').replaceWith(rev);
                    $('.cogsum').replaceWith(cog);
                    $('.grossprofit').replaceWith(gross);
                    $('.expense').replaceWith(expense);
                    $('.netincome').replaceWith(netincome);
                    // ---------------Prevyear
                    var rev1 = '<td>' + datas['prevyear'][0].toLocaleString('en-US') + '</td>';
                    var cog1 = '<td style="border-bottom: 1px solid #000;">' + datas['prevyear'][1]
                        .toLocaleString('en-US') + '</td>';
                    var gross1 = '<td>' + datas['prevyear'][2].toLocaleString('en-US') + '</td>';
                    var expense1 = '<td style="border-bottom: 1px solid #000;">' + datas['prevyear'][3]
                        .toLocaleString('en-US') + '</td>';
                    var netincome1 = '<td  style="border-bottom: 1px solid #000;">' + datas['prevyear'][
                        4
                    ].toLocaleString('en-US') + '</td>';
                    $('.prevrevsum').replaceWith(rev1);
                    $('.prevcogsum').replaceWith(cog1);
                    $('.prevgrossprofit').replaceWith(gross1);
                    $('.prevexpense').replaceWith(expense1);
                    $('.prevnetincome').replaceWith(netincome1);
                    // ---------------------$ Change

                    var revchange = '<td>' + datas['Change'][0].toLocaleString('en-US') + '</td>';
                    var cogchange = '<td>' + datas['Change'][1].toLocaleString('en-US') + '</td>';
                    var grosschange = '<td>' + datas['Change'][2].toLocaleString('en-US') + '</td>';
                    var expchange = '<td>' + datas['Change'][3].toLocaleString('en-US') + '</td>';
                    var netchange = '<td>' + datas['Change'][4].toLocaleString('en-US') + '</td>';

                    $('.rchange').replaceWith(revchange);
                    $('.cchange').replaceWith(cogchange);
                    $('.grosschange').replaceWith(grosschange);
                    $('.expchange').replaceWith(expchange);
                    $('.netchange').replaceWith(netchange);
                    // ---------------------%Change 
                    var revperchange = '<td>' + datas['percentage'][0].toLocaleString('en-US') + '%' +
                        '</td>';
                    var cogperchange = '<td>' + datas['percentage'][1].toLocaleString('en-US') + '%' +
                        '</td>';
                    var grossperchange = '<td>' + datas['percentage'][2].toLocaleString('en-US') + '%' +
                        '</td>';
                    var expperchange = '<td>' + datas['percentage'][3].toLocaleString('en-US') + '%' +
                        '</td>';
                    var netperchange = '<td>' + datas['percentage'][4].toLocaleString('en-US') + '%' +
                        '</td>';

                    $('.rperchange').replaceWith(revperchange);
                    $('.cperchange').replaceWith(cogperchange);
                    $('.grossperchange').replaceWith(grossperchange);
                    $('.expperchange').replaceWith(expperchange);
                    $('.netperchange').replaceWith(netperchange);
                }
            });
        } else {
            if (selecteddate) {
                // $('#submit').click();
                const url = window.location.href;
                window.location.href = url;
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        var rsum = $("#rsum").val();
        var csum = $("#csum").val();
        var grossprofit = $("#grossprofit").val();
        var expsum = $("#expsum").val();
        var netincome = $("#netincome").val();

        var ctx = document.getElementById("chart-bars").getContext("2d");
        var positions = [];
        // console.log(positions)
        $('.revsum :input[class="keys"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
            // console.log(xaxes)
        });
        var ypositions = [];
        $('.netincome :input[class="match"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });

        var xValues = positions;
        var yValues = ypositions;

        var customChartTitle = "{{ @$variable }}";

        new Chart(ctx, {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "NetIncome",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: yValues,
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: customChartTitle,
                        color: 'white',
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });

    // <!-- Currently working -->
</script>
<!-- Currently working -->
<script>
    $(document).ready(function() {
        var id = $(".grphid").val();
        var attribute = id.split(',');
        // console.log(attribute);
        for (var i = 0; i < attribute.length; i++) {
            $("#" + attribute[i] + "").show();
        }
    });
</script>
<script>
    var ctx2 = document.getElementById("chart-line").getContext("2d");
    var x = [];
    $('.revsum :input[class="keys"]').each(function() {
        var xaxis = $(this).val();

        x.push(xaxis);

    });
    var y = [];
    $('.cust :input[class="customer"]').each(function() {
        var yaxis = $(this).val();
        y.push(yaxis);

    });
    var xValues = x;
    var yValues = y;

    var customChartTitle2 = "{{ @$variable2 }}";

    new Chart(ctx2, {
        type: "line",
        data: {
            labels: x,
            datasets: [{
                label: "Customer",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: y,
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: customChartTitle2,
                    color: 'white',
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var ctx3 = document.getElementById("chart-rev").getContext("2d");
    var x = [];
    $('.revsum :input[class="keys"]').each(function() {
        var xaxis = $(this).val();
        x.push(xaxis);
    });
    var y = [];
    $('.revsum :input[class="match"]').each(function() {
        var yaxis = $(this).val();
        y.push(yaxis);

    });
    var xValues = x;

    var yValues = y;

    var customChartTitle3 = "{{ @$variable3 }}";

    new Chart(ctx3, {
        type: "line",
        data: {
            labels: x,
            datasets: [{
                label: "Revenue",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: y,
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: customChartTitle3,
                    color: 'white',
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var ctx4 = document.getElementById("chart-cogs").getContext("2d");
    var x = [];
    $('.revsum :input[class="keys"]').each(function() {
        var xaxis = $(this).val();
        x.push(xaxis);
    });
    var y = [];
    $('.cogsum :input[class="match"]').each(function() {
        var yaxis = $(this).val();
        y.push(yaxis);

    });
    var xValues = x;

    var yValues = y;
    var customChartTitle4 = "{{ @$variable4 }}";
    new Chart(ctx4, {
        type: "line",
        data: {
            labels: x,
            datasets: [{
                label: "Cogs",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: y,
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: customChartTitle4,
                    color: 'white',
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    var ctx5 = document.getElementById("chart-gross").getContext("2d");
    var x = [];
    $('.revsum :input[class="keys"]').each(function() {
        var xaxis = $(this).val();

        x.push(xaxis);

    });
    var y = [];
    $('.grossprofit :input[class="match"]').each(function() {
        var yaxis = $(this).val();
        y.push(yaxis);

    });
    var xValues = x;
    var yValues = y;

    var customChartTitle5 = "{{ @$variable5 }}";
    new Chart(ctx5, {
        type: "line",
        data: {
            labels: x,
            datasets: [{
                label: "Gross Profit",
                tension: 0,
                borderWidth: 0,
                pointRadius: 5,
                pointBackgroundColor: "rgba(255, 255, 255, .8)",
                pointBorderColor: "transparent",
                borderColor: "rgba(255, 255, 255, .8)",
                borderColor: "rgba(255, 255, 255, .8)",
                borderWidth: 4,
                backgroundColor: "transparent",
                fill: true,
                data: y,
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: customChartTitle5,
                    color: 'white',
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: 'rgba(255, 255, 255, .2)'
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#f8f9fa',
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
<script>
    $('#loc').on('change', function() {
        var location = $("#loc").val();
        if (location) {
            $('#sbmit-btn').click();
        }
    });
</script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<script>
    $('#selectloc').on('change', function() {
        var location = $("#location").val();
        if (location) {
            $('#sbmit-btn').click();
        }
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("chart").getContext("2d");
        var positions = [];
        $('.csum :input[class="keys"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.csum :input[class="match"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var xValues = positions;
        var yValues = ypositions;

        // Create a plugin to display data values on bars
        const dataValuesPlugin = {
            id: 'dataValues',
            afterDatasetsDraw(chart, args, options) {
                if (options.display) {
                    const {
                        ctx,
                        data,
                        chartArea: {
                            top,
                            bottom,
                            left,
                            right
                        },
                        scales: {
                            x,
                            y
                        }
                    } = chart;
                    ctx.save();
                    data.datasets.forEach((dataset, datasetIndex) => {
                        chart.getDatasetMeta(datasetIndex).data.forEach((bar, index) => {
                            const value = dataset.data[index];
                            const xPosition = bar.x;
                            const yPosition = bar.y;
                            ctx.font = 'bold 12px Arial';
                            ctx.fillStyle = '#fff';
                            ctx.textAlign = 'center';

                            const yOffset = (index % 2 === 0) ? -18 : -5;

                            ctx.fillText(value, xPosition, yPosition + yOffset);
                        });
                    });
                    ctx.restore();
                }
            }
        };

        // Initialize chart with the plugin
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: xValues,
                datasets: [{
                    label: "Past-Due-Account",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "rgba(0, 123, 255, 0.8)", // Bar color
                    fill: true,
                    data: yValues,
                    maxBarThickness: 6
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    dataValues: {
                        display: false // Initially set to false
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
            plugins: [dataValuesPlugin]
        });

        // Toggle the data values on the chart when the checkbox is clicked
        $('#pastdueAccount').change(function() {
            const displayValues = $(this).is(':checked');
            myChart.options.plugins.dataValues.display = displayValues;
            myChart.update();
        });
    });
</script>



<script>
    $(document).ready(function() {


        var ctx6 = document.getElementById("chart-pstdue").getContext("2d");
        var positions = [];
        $('.revsum :input[class="keys"]').each(function() {

            var xaxes = $(this).val();
            positions.push(xaxes);

        });
        var ypositions = [];
        $('.pastdueacc :input[class="match"]').each(function() {

            var yaxes = $(this).val();

            ypositions.push(yaxes);
        });
        var xValues = positions;

        var yValues = ypositions;

        var customChartTitle6 = "{{ @$variable6 }}";
        new Chart(ctx6, {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                    label: "Past-Due-Account",
                    tension: 0,
                    borderWidth: 0,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderColor: "rgba(255, 255, 255, .8)",
                    borderWidth: 4,
                    backgroundColor: "transparent",
                    fill: true,
                    data: yValues,
                    maxBarThickness: 6
                }, ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: customChartTitle6,
                        color: 'white',
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("chart-per").getContext("2d");
        var positions = [];
        $('.csum :input[class="keys"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.pastdueper :input[class="per"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var xValues = positions;
        var yValues = ypositions;

        const dataValuesPlugin = {
            id: 'dataValues',
            afterDatasetsDraw(chart, args, options) {
                if (options.display) {
                    const {
                        ctx,
                        data,
                        chartArea: {
                            top,
                            bottom,
                            left,
                            right
                        },
                        scales: {
                            x,
                            y
                        }
                    } = chart;
                    ctx.save();
                    data.datasets.forEach((dataset, datasetIndex) => {
                        chart.getDatasetMeta(datasetIndex).data.forEach((point, index) => {
                            const value = dataset.data[index];
                            const xPosition = point.x;
                            const yPosition = point.y;
                            ctx.font = 'bold 12px Arial';
                            ctx.fillStyle = '#fff';
                            ctx.textAlign = 'center';

                            const yOffset = (index % 2 === 0) ? 20 : -20;

                            ctx.fillText(value, xPosition, yPosition + yOffset);
                        });
                    });
                    ctx.restore();
                }
            }
        };

        const myChartPer = new Chart(ctx, {
            type: 'line',
            data: {
                labels: xValues,
                datasets: [{
                    label: "Percentage",
                    tension: 0,
                    borderWidth: 4,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    backgroundColor: "transparent",
                    fill: true,
                    data: yValues,
                    maxBarThickness: 6
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    dataValues: {
                        display: false // Initially set to false
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
            plugins: [dataValuesPlugin]
        });

        $('#pastduePercentage').change(function() {
            const displayValues = $(this).is(':checked');
            myChartPer.options.plugins.dataValues.display = displayValues;
            myChartPer.update();
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("chart-hourly").getContext("2d");
        var positions = [];
        $('.csum :input[class="keys"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.hourly :input[class="hour"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var xValues = positions;
        var yValues = ypositions;

        const dataValuesPlugin = {
            id: 'dataValues',
            afterDatasetsDraw(chart, args, options) {
                if (options.display) {
                    const {
                        ctx,
                        data,
                        chartArea: {
                            top,
                            bottom,
                            left,
                            right
                        },
                        scales: {
                            x,
                            y
                        }
                    } = chart;
                    ctx.save();
                    data.datasets.forEach((dataset, datasetIndex) => {
                        chart.getDatasetMeta(datasetIndex).data.forEach((point, index) => {
                            const value = dataset.data[index];
                            const xPosition = point.x;
                            const yPosition = point.y;
                            ctx.font = 'bold 12px Arial';
                            ctx.fillStyle = '#fff';
                            ctx.textAlign = 'center';

                            const yOffset = (index % 2 === 0) ? -10 : 20;

                            ctx.fillText(value, xPosition, yPosition + yOffset);
                        });
                    });
                    ctx.restore();
                }
            }
        };

        // Initialize the line chart with the plugin
        const myChartHourly = new Chart(ctx, {
            type: 'line',
            data: {
                labels: xValues,
                datasets: [{
                    label: "Percentage",
                    tension: 0,
                    borderWidth: 4,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    backgroundColor: "transparent",
                    fill: true,
                    data: yValues,
                    maxBarThickness: 6
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    dataValues: {
                        display: false
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
            plugins: [dataValuesPlugin]
        });

        $('#hourlyPercentage').change(function() {
            const displayValues = $(this).is(':checked');
            myChartHourly.options.plugins.dataValues.display = displayValues;
            myChartHourly.update();
        });
    });
</script>

<script>
    $(document).ready(function() {
        var ctx = document.getElementById("chart-overtime").getContext("2d");
        var positions = [];
        $('.csum :input[class="keys"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.ovrtime :input[class="overtime"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var xValues = positions;
        var yValues = ypositions;

        const dataValuesPlugin = {
            id: 'dataValues',
            afterDatasetsDraw(chart, args, options) {
                if (options.display) {
                    const {
                        ctx,
                        data,
                        chartArea: {
                            top,
                            bottom,
                            left,
                            right
                        },
                        scales: {
                            x,
                            y
                        }
                    } = chart;
                    ctx.save();
                    data.datasets.forEach((dataset, datasetIndex) => {
                        chart.getDatasetMeta(datasetIndex).data.forEach((point, index) => {
                            const value = dataset.data[index];
                            const xPosition = point.x;
                            const yPosition = point.y;
                            ctx.font = 'bold 12px Arial';
                            ctx.fillStyle = '#fff';
                            ctx.textAlign = 'center';

                            const yOffset = (index % 2 === 0) ? -20 : 20;

                            ctx.fillText(value, xPosition, yPosition + yOffset);
                        });
                    });
                    ctx.restore();
                }
            }
        };

        const myChartOvertime = new Chart(ctx, {
            type: 'line',
            data: {
                labels: xValues,
                datasets: [{
                    label: "Percentage",
                    tension: 0,
                    borderWidth: 4,
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(255, 255, 255, .8)",
                    pointBorderColor: "transparent",
                    borderColor: "rgba(255, 255, 255, .8)",
                    backgroundColor: "transparent",
                    fill: true,
                    data: yValues,
                    maxBarThickness: 6
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    dataValues: {
                        display: false
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'rgba(255, 255, 255, .2)'
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#f8f9fa',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
            plugins: [dataValuesPlugin]
        });

        $('#overtimePercentage').change(function() {
            const displayValues = $(this).is(':checked');
            myChartOvertime.options.plugins.dataValues.display = displayValues;
            myChartOvertime.update();
        });
    });
</script>

<script>
    $(document).ready(function() {
        var income = document.getElementById("chart-income").getContext("2d");
        var positions = [];
        $('.inc :input[class="r_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.inc :input[class="inc_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var rpositions = [];
        $('.inc :input[class="r_val"]').each(function() {
            var raxes = $(this).val();
            rpositions.push(raxes);
        });
        var lstrpositions = [];
        $('.inc :input[class="lastr_val"]').each(function() {
            var raxes = $(this).val();
            lstrpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var rValues = rpositions;
        var lastrValues = lstrpositions;
        // console.log(rValues);
        new Chart(income, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: rValues,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastrValues,
                        maxBarThickness: 4
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
</script>
<script>
    $(document).ready(function($) {
        var cogs_graph = document.getElementById("chart-cogsdata").getContext("2d");
        var positions = [];
        $('.inc :input[class="cog_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.inc :input[class="cog_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var cpositions = [];
        $('.inc :input[class="c_val"]').each(function() {
            var caxes = $(this).val();
            cpositions.push(caxes);
        });
        var lstcpositions = [];
        $('.inc :input[class="lastcog_val"]').each(function() {
            var raxes = $(this).val();
            lstcpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var cValues = cpositions;
        var lastcValues = lstcpositions;


        new Chart(cogs_graph, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 4
                    }, {
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: cValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastcValues,
                        maxBarThickness: 4
                    }

                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
        var gross_profit = document.getElementById("chart-grprofit").getContext("2d");
        var positions = [];
        $('.inc :input[class="gro_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.inc :input[class="gros_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var y_positions = [];
        $('.inc :input[class="gro_val"]').each(function() {
            var y_axes = $(this).val();
            y_positions.push(y_axes);
        });
        var lsty_positions = [];
        $('.inc :input[class="lastgro_val"]').each(function() {
            var y_axes = $(this).val();
            lsty_positions.push(y_axes);
        });

        var xValues = positions;
        var yValues = ypositions;
        var y_values = y_positions;
        var lasty_values = lsty_positions;
        new Chart(gross_profit, {
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    },
                    {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: y_values,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lasty_values,
                        maxBarThickness: 4
                    }

                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
        var expen = document.getElementById("chart-exp").getContext("2d");
        var positions = [];
        $('.inc :input[class="ex_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.inc :input[class="exp_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var y_positions = [];
        $('.inc :input[class="ex_val"]').each(function() {
            var y_axes = $(this).val();
            y_positions.push(y_axes);
        });
        var lsty_positions = [];
        $('.inc :input[class="lastex_val"]').each(function() {
            var y_axes = $(this).val();
            lsty_positions.push(y_axes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var y_values = y_positions;
        var lsty_values = lsty_positions;
        new Chart(expen, {
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: y_values,
                        maxBarThickness: 4
                    }, {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lsty_values,
                        maxBarThickness: 4
                    }

                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });

        var netinc = document.getElementById("chart-netincome").getContext("2d");
        var positions = [];
        $('.inc :input[class="n_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.inc :input[class="net_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var y_positions = [];
        $('.inc :input[class="n_val"]').each(function() {
            var y_axes = $(this).val();
            y_positions.push(y_axes);
        });
        var lsty_positions = [];
        $('.inc :input[class="lstn_val"]').each(function() {
            var y_axes = $(this).val();
            lsty_positions.push(y_axes);
        });

        var xValues = positions;
        var yValues = ypositions;
        var y_values = y_positions;
        var lsty_values = lsty_positions;
        new Chart(netinc, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 10,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: y_values,
                        maxBarThickness: 4
                    }, {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lsty_values,
                        maxBarThickness: 4
                    }

                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
    $(document).ready(function() {
        var custom = document.getElementById("chart-cust").getContext("2d");
        var positions = [];
        $('.customer :input[class="prevc_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.customer :input[class="c_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var rpositions = [];
        $('.customer :input[class="prevc_val"]').each(function() {
            var raxes = $(this).val();
            rpositions.push(raxes);
        });
        var lstcpositions = [];
        $('.customer :input[class="lastc_val"]').each(function() {
            var raxes = $(this).val();
            lstcpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var rValues = rpositions;
        var lastrValues = lstcpositions;
        // console.log(rValues);
        new Chart(custom, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: rValues,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastrValues,
                        maxBarThickness: 4
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
    $(document).ready(function() {
        var cogchart = document.getElementById("chart-cog").getContext("2d");
        var positions = [];
        $('.cogs :input[class="c_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.cogs :input[class="cog_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var rpositions = [];
        $('.cogs :input[class="c_val"]').each(function() {
            var raxes = $(this).val();
            rpositions.push(raxes);
        });
        var lstcpositions = [];
        $('.cogs :input[class="lastc_val"]').each(function() {
            var raxes = $(this).val();
            lstcpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var rValues = rpositions;
        var lastrValues = lstcpositions;
        // console.log(rValues);
        new Chart(cogchart, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: rValues,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastrValues,
                        maxBarThickness: 4
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
    $(document).ready(function() {
        var grosschart = document.getElementById("chart-gross-profit").getContext("2d");
        var positions = [];
        $('.gross-profit :input[class="g_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.gross-profit :input[class="gross_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var rpositions = [];
        $('.gross-profit :input[class="g_val"]').each(function() {
            var raxes = $(this).val();
            rpositions.push(raxes);
        });
        var lstcpositions = [];
        $('.gross-profit :input[class="lastg_val"]').each(function() {
            var raxes = $(this).val();
            lstcpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var rValues = rpositions;
        var lastrValues = lstcpositions;
        // console.log(rValues);
        new Chart(grosschart, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: rValues,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastrValues,
                        maxBarThickness: 4
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
    $(document).ready(function() {
        var grosschart = document.getElementById("chart-expenses").getContext("2d");
        var positions = [];
        $('.expenses :input[class="e_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.expenses :input[class="expense_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var rpositions = [];
        $('.expenses :input[class="e_val"]').each(function() {
            var raxes = $(this).val();
            rpositions.push(raxes);
        });
        var lstcpositions = [];
        $('.expenses :input[class="laste_val"]').each(function() {
            var raxes = $(this).val();
            lstcpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var rValues = rpositions;
        var lastrValues = lstcpositions;
        // console.log(rValues);
        new Chart(grosschart, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: rValues,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastrValues,
                        maxBarThickness: 4
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });
    $(document).ready(function() {
        var netchart = document.getElementById("chart-net-income").getContext("2d");
        var positions = [];
        $('.netincome :input[class="ne_key"]').each(function() {
            var xaxes = $(this).val();
            positions.push(xaxes);
        });
        var ypositions = [];
        $('.netincome :input[class="neti_val"]').each(function() {
            var yaxes = $(this).val();
            ypositions.push(yaxes);
        });
        var rpositions = [];
        $('.netincome :input[class="ne_val"]').each(function() {
            var raxes = $(this).val();
            rpositions.push(raxes);
        });
        var lstcpositions = [];
        $('.netincome :input[class="lastn_val"]').each(function() {
            var raxes = $(this).val();
            lstcpositions.push(raxes);
        });
        var xValues = positions;
        var yValues = ypositions;
        var rValues = rpositions;
        var lastrValues = lstcpositions;
        // console.log(rValues);
        new Chart(netchart, {

            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                        type: "bar",
                        label: "2023",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#4285F4",
                        pointBorderColor: "#4285F4",
                        borderColor: "#4285F4",
                        borderWidth: 4,
                        backgroundColor: "#4285F4",
                        fill: true,
                        data: yValues,
                        maxBarThickness: 15
                    }, {
                        type: "line",
                        label: "2022",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "red",
                        pointBorderColor: "transparent",
                        borderColor: "red",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: rValues,
                        maxBarThickness: 4
                    },
                    {
                        type: "line",
                        label: "2021",
                        tension: 0,
                        borderWidth: 0,
                        pointRadius: 5,
                        pointBackgroundColor: "#ffc107",
                        pointBorderColor: "transparent",
                        borderColor: "#ffc107",
                        borderWidth: 4,
                        backgroundColor: "transparent",
                        fill: true,
                        data: lastrValues,
                        maxBarThickness: 4
                    }
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                            color: 'black'
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: 'black',
                            padding: 10,
                            font: {
                                size: 14,
                                weight: 300,
                                family: "Roboto",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    });

    $('#ytdbonus').on('click', function() {
        var checked = $('#ytdbonus').is(':checked');
        var selecteddate = $("#date").val();
        var selectedlocation = $("#location").val();
        if (checked) {
            var selecteddate = $("#date").val();
            var selectedlocation = $("#location").val();
            var url = "{{url('/ytdate')}}";
            var token = '{{ csrf_token() }}';
            $.ajax({
                url: url,
                data: {
                    date: selecteddate,
                    location: selectedlocation,
                    _token: token,
                },
                type: 'POST',
                success: function(data) {
                    // console.log(data)
                    var datas = $.parseJSON(data);
                    var rev = '<td >' + datas['currentyear'][0].toLocaleString('en-US') + '</td>';
                    var cog = '<td >' + datas['currentyear'][1].toLocaleString('en-US') + '</td>';
                    var gross = '<td>' + datas['currentyear'][2].toLocaleString('en-US') + '</td>';
                    var expense = '<td>' + datas['currentyear'][3].toLocaleString('en-US') + '</td>';
                    var netincome = '<td >' + datas['currentyear'][4].toLocaleString('en-US') + '</td>';
                    $('.ytdrevsum').html(rev);
                    $('.ytdcogsum').html(cog);
                    $('.ytdgrossprofit').html(gross);
                    $('.ytdexpense').html(expense);
                    $('.ytdnetincome').html(netincome);
                },
            })
        }
    });
</script>