define([], function(){
    return {
        array_data:function(accion){
            var myjson = {
                cedula : ""+$("#input_0").val(),
                nombre : ""+$("#input_1").val(),
                apellido : ""+$("#input_2").val(),
                dirrecion : ""+$("#input_3").val(),
                edad : ""+$("#input_4").val()
            };
            $.ajax({
                url: "API/servicie_inicio.php",
                type: "POST",
                data: {"action":''+accion, 'myjson': JSON.stringify(myjson)},
                success: function (res) {
                    var p1 = JSON.parse(res);
                    console.log(p1);
                    if(p1['data'].length <= 0){
                        alert(p1['info']['code']+" "+p1['info']['message']);
                        $("#input_0").val('');
                        $("#input_1").val('');
                        $("#input_2").val('');
                        $("#input_3").val('');
                        $("#input_4").val('');
                    }else{
                        $("#input_0").val(''+p1['data']['cc']);
                        $("#input_1").val(''+p1['data']['nom']);
                        $("#input_2").val(''+p1['data']['ape']);
                        $("#input_3").val(''+p1['data']['dir']);
                        $("#input_4").val(''+p1['data']['eda']);
                    }
                }
            });
        }
    }
}) 