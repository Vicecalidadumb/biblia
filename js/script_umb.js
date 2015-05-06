$('#buscar_1').click(function() {
    $('#result').html('');
    var url = base_url_js + "index.php/statistics/result1_report1";
    Metronic.blockUI({
        target: '.result',
        message: 'Cargando...'
    });
    $.post(url, $('#form_aulanet_1').serialize())
            .done(function(data) {
                Metronic.unblockUI('.result');
                $('#result').html(data);
            }).fail(function() {
        Metronic.unblockUI('.result');
    })
});

function get_bar_table(id, data, title) {
    $('#' + id).highcharts({
        data: {
            table: data
        },
        chart: {
            type: 'bar'
        },
        title: {
            text: title
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Unidades'
            }
        }, tooltip: {
            formatter: function() {
                return '<b>' + this.series.name + '</b><br/>' +
                        this.point.y + ' ' + this.point.name.toLowerCase();
            }
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
    });
}


$('#buscar_2').click(function() {
    $('#result').html('');
    var url = base_url_js + "index.php/questions/result1_report1";
    Metronic.blockUI({
        target: '.result',
        message: 'Cargando...'
    });
    $.post(url, $('#form_aulanet_1').serialize())
            .done(function(data) {
                Metronic.unblockUI('.result');
                $('#result').html(data);
            }).fail(function() {
        Metronic.unblockUI('.result');
    })
});
$('#buscar_3').click(function() {
//    $('#result').html('');
//    var url = base_url_js + "index.php/questions/search_cuestionario";
    Metronic.blockUI({
        target: '.result',
        message: 'Cargando...'
    });
    var period=$('#period').val();
    var mat=$('.mat').val();
    var mat2=mat.split(' :: ');
//    console.log(mat2);
    var periodo="joandu118080umb"+period+"joandu118080umb";
    var profcod="joandu118080umb"+'52149139'+"joandu118080umb";
    var nrocte="joandu118080umb"+'62264'+"joandu118080umb";
//        var profcod="joandu118080umb"+mat2[3]+"joandu118080umb";
//    var nrocte="joandu118080umb"+mat2[2]+"joandu118080umb";
    var grupo="joandu118080umb"+mat2[1]+"joandu118080umb";
    var matcod="joandu118080umb"+mat2[0]+"joandu118080umb";
    periodo=base64_encode(periodo);
    profcod=base64_encode(profcod);
    nrocte=base64_encode(nrocte);
    grupo=base64_encode(grupo);
    matcod=base64_encode(matcod);
    var url="http://aulanet.umb.edu.co/aulanet_jh/cuestionario/cuestionario.php?viprincipal=&matcod="+matcod+"&grupo="+grupo+"&nrocte="+nrocte+"&profcod="+profcod+"&periodo="+periodo
    $('#iframe_cues').attr('src',url);
    Metronic.unblockUI('.result');
});


function base64_encode(data) {
  var b64 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=';
  var o1, o2, o3, h1, h2, h3, h4, bits, i = 0,
    ac = 0,
    enc = '',
    tmp_arr = [];

  if (!data) {
    return data;
  }

  do { // pack three octets into four hexets
    o1 = data.charCodeAt(i++);
    o2 = data.charCodeAt(i++);
    o3 = data.charCodeAt(i++);

    bits = o1 << 16 | o2 << 8 | o3;

    h1 = bits >> 18 & 0x3f;
    h2 = bits >> 12 & 0x3f;
    h3 = bits >> 6 & 0x3f;
    h4 = bits & 0x3f;

    // use hexets to index into b64, and append result to encoded string
    tmp_arr[ac++] = b64.charAt(h1) + b64.charAt(h2) + b64.charAt(h3) + b64.charAt(h4);
  } while (i < data.length);

  enc = tmp_arr.join('');

  var r = data.length % 3;

  return (r ? enc.slice(0, r - 3) : enc) + '==='.slice(r || 3);
}


function cambio_programa() {
    $('#div_mat').html('');
    var url = base_url_js + "index.php/questions/cambio_programa/";
    Metronic.blockUI({
        target: '.div_mat',
        message: 'Cargando...'
    });
    $.post(url, $('#form_aulanet_1').serialize())
            .done(function(data) {
                Metronic.unblockUI('.div_mat');
                $('#div_mat').html(data);
            }).fail(function() {
        Metronic.unblockUI('.result');
    })

}