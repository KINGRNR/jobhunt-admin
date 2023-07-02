
<script type="text/javascript">
 $(() => {
        init()
       
    })
    init = async () => {
        unblockPage();
    }
    


    root = am5.Root.new("totalapplicants"); 

root.setThemes([
  am5themes_Animated.new(root)
]);

 chart = root.container.children.push( 
  am5xy.XYChart.new(root, {
    panY: false,
    wheelY: "zoomX",
    layout: root.verticalLayout
  }) 
);

// Define data
 data = [{
  "bulan": "Januari",
  "pelamar": 100
}, {
  "bulan": "Februari",
  "pelamar": 200
}, {
  "bulan": "Maret",
  "pelamar": 300
}, {
  "bulan": "April",
  "pelamar": 400
},{
  "bulan": "Mei",
  "pelamar": 500
},{
  "bulan": "Juni",
  "pelamar": 450
},{
  "bulan": "Juli",
  "pelamar": 600
},{
  "bulan": "Agustus",
  "pelamar": 800
},]

// Craete Y-axis
 yAxis = chart.yAxes.push(
  am5xy.ValueAxis.new(root, {
    renderer: am5xy.AxisRendererY.new(root, {})
  })
);

// Create X-Axis
 xAxis = chart.xAxes.push(
  am5xy.CategoryAxis.new(root, {
    maxDeviation: 0.2,
    renderer: am5xy.AxisRendererX.new(root, {}),
    categoryField: "bulan"
  })
);
xAxis.data.setAll(data);

// Create series
function createSeries(name, field) {
   series = chart.series.push( 
    am5xy.LineSeries.new(root, { 
      name: name,
      xAxis: xAxis, 
      yAxis: yAxis, 
      valueYField: field, 
      categoryXField: "bulan",
      stacked: true
    }) 
  );
  series.strokes.template.setAll({
    strokeWidth: 3,
    strokeDasharray: [10,5]
  });
  series.fills.template.setAll({
    fillOpacity: 0.5,
    visible: true
  });
  series.data.setAll(data);
}

createSeries("Pelamar", "pelamar");


</script>