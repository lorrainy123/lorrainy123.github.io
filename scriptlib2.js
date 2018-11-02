$(document).ready(function(){

     $("button#roll_up").click(function() {
       var table1_items = [];
       var i = 0;
       var airtable_read_endpoint = "https://api.airtable.com/v0/appsTlIEef6nhpU5q/Score?api_key=keyoBP8I4GOGpxbjZ";
       var table1_dataSet = [];
       $.getJSON(airtable_read_endpoint, function(result) {
              $.each(result.records, function(key,value) {
                  table1_items = [];
                      table1_items.push(value.fields.Name);
                      table1_items.push(value.fields.Douban);
                      table1_items.push(value.fields.Maoyan);
                      table1_items.push(value.fields.IMDB);
                      table1_items.push(value.fields.RottenTomatoes);
                      table1_items.push(value.fields.AverageScore);
                      table1_dataSet.push(table1_items);
                      console.log(table1_items);
               }); // end .each
               console.log(table1_dataSet);

            $('#table1').DataTable( {
                data: table1_dataSet,
                retrieve: true,
                columns: [
                    { title: "Name",
                      defaultContent:""},
                    { title: "Douban",
                        defaultContent:"" },
                    { title: "Maoyan",
                      defaultContent:"" },
                    { title: "IMDB",
                      defaultContent:""},
                    { title: "RottenTomatoes",
                        defaultContent:""},
                    { title: "AverageScore",
                      defaultContent:""},
                ]
            } );
       }); // end .getJSON

         var table2_items = [];
         var i = 0;
         var airtable_read_endpoint =
         "https://api.airtable.com/v0/appsTlIEef6nhpU5q/Score?api_key=keyoBP8I4GOGpxbjZ";
         var table2_dataSet = [];
         $.getJSON(airtable_read_endpoint, function(result) {
                $.each(result.records, function(key,value) {
                    table2_items = [];
                        table2_items.push(value.fields.Name);
                        table2_items.push(value.fields.Box_Office_MUSD);
                        table2_items.push(value.fields.Budget_MUSD);
                        table2_items.push(value.fields.Profit);
                        table2_dataSet.push(table2_items);
                        console.log(table2_items);
                 }); // end .each
                 console.log(table2_dataSet);
                $('#table2').DataTable( {
                    data: table2_dataSet,
                    retrieve: true,
                    ordering: false,
                    columns: [
                        { title: "Name",
                          defaultContent:""},
                        { title: "Box_Office_MUSD",
                          defaultContent:""},
                        { title: "Budget_MUSD",
                          defaultContent:""},
                        { title: "Profit",
                          defaultContent:""},
                    ] // rmf columns
                } ); // end dataTable

                var chart = c3.generate({
                     data: {
                         columns: table2_dataSet,
                         type : 'bar'
                     },
                     donut: {
                         title: "Tasks for Each Stage:",
                     }
                 });

          }); // end .getJSON
       }); // end button

        // $.getJSON('http://localhost/d756a/data_export.json/Computer+TV', function(obj) {

}); // document ready
