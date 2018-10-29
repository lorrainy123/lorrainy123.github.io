$(document).ready(function(){
    $("button#hide_h2").click(function() {
        $("h2").hide(500);
    });

    $("button#show_h2").click(function() {
        $("h2").show(300);
        $("h2").css("color","blue");
        $("h2").html("You clicked me hard.");
    });

    $("button#get_data").click(function() {
        var items = [];
        var i = 0;
        var airtable_read_endpoint = "https://api.airtable.com/v0/appsTlIEef6nhpU5q/%E8%AF%84%E5%88%86%E7%B3%BB%E7%BB%9F?maxRecords=3&view=Grid%20view key=keyoBP8I4GOGpxbjZ";
        var dataSet = [];
        $.getJSON(airtable_read_endpoint, function(result) {
               $.each(result.records, function(key,value) {
                   items = [];
                       items.push(value.fields.Douban_InDepth);
                       items.push(value.fields.Maoyan_AfterShock);
                       items.push(value.fields.IMDB_Comprehensive);
                       items.push(value.fields.RottenTomatoes_Comprehensive);
                       items.push(value.fields.Average);
                       dataSet.push(items);
                }); // end .each
             $('#example').DataTable( {
                 data: dataSet,
                 retrieve: true,
                 columns: [
                     { title: "Douban_InDepth",
                       defaultContent:""},
                     { title: "Maoyan_AfterShock",
                       defaultContent:"" },
                     { title: "IMDB_Comprehensive",
                       defaultContent:""},
                     { title: "RottenTomatoes_Comprehensive",
                       defaultContent:""},
                     { title: "Average",
                         defaultContent:""},
                 ]
             } );
        }); // end .getJSON
     }); // end button
}); // document ready
