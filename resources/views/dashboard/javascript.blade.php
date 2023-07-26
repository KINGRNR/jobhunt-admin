<script type="text/javascript">
    $(() => {
        init()

    })
    init = async () => {
        unblockPage();
    }

    $(document).ready(function() {
        // Check if the user has visited the welcome page before
        const hasVisitedWelcomePage = localStorage.getItem('hasVisitedWelcomePage');

        // If the user hasn't visited the welcome page, show the popup
        if (!hasVisitedWelcomePage) {
            // Load the welcome page as a full-size popup
            let timerInterval
            Swal.fire({
              icon: 'warning',
                title: "Welcome Admin!",
                html: "Any actions you take on this portal have a <b>significant impact</b> on the sustainability of this website!! <br><br> This Warning Will Close In <span></span> Second ",
                timer: 10000, // 5 seconds
                showConfirmButton: false,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('span')
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                    }, 100)
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
            // Set the flag in local storage to indicate that the user has visited the welcome page
            localStorage.setItem('hasVisitedWelcomePage', 'true');
        }
    });

    function closeWelcomePopup() {
        $('#welcomePopup').remove();
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
    }, {
        "bulan": "Mei",
        "pelamar": 500
    }, {
        "bulan": "Juni",
        "pelamar": 450
    }, {
        "bulan": "Juli",
        "pelamar": 600
    }, {
        "bulan": "Agustus",
        "pelamar": 800
    }, ]

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
            strokeDasharray: [10, 5]
        });
        series.fills.template.setAll({
            fillOpacity: 0.5,
            visible: true
        });
        series.data.setAll(data);
    }

    createSeries("Pelamar", "pelamar");
</script>
