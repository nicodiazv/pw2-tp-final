{{> headeradministrador}}

<div class="row justify-content-between">
    {{> sideBarAdministrador}}

    <div id="blog" class="blog col-md-9">

        <div class="section-title">
            <h2>Notas</h2>
            <p>Graficos sobre notas</p>
        </div>

        <div>

            <!--Load the AJAX API-->
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                // Load the Visualization API and the corechart package.
                google.charts.load('current', {
                    'packages': ['corechart']
                });

                // Set a callback to run when the Google Visualization API is loaded.
                google.charts.setOnLoadCallback(drawChart);

                // Callback that creates and populates a data table,
                // instantiates the pie chart, passes in the data and
                // draws it.
                function drawChart() {

                    // Create the data table.
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Seccion');
                    data.addColumn('number', 'Notas');
                    data.addRows([
                        {{#notasPorSeccion}}
                        ['{{seccion_nombre}}', {{cantidad}}],
                        {{/notasPorSeccion}}  
                    ]);

                    // Set chart options
                    var options = {
                        'title': 'Notas creadas por secciones',
                        'width': 500,
                        'height': 500
                    };

                    // Instantiate and draw our chart, passing in some options.
                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                    chart.draw(data, options);
                }
            </script>


            <!--Div that will hold the pie chart-->
            <div id="chart_div"></div>

        </div>


    </div>
</div>
{{> footer}}