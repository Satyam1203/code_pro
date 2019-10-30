$(document).ready(()=>{
    console.log('Code');
    $("#dbt").click(()=>{
        let name = $("#name").val();
        let link = $("#link").val();
        let issue = $("#issue").val();

        $.ajax({
            url:'api/programming.php',
            method:'POST',
            data:{name:name,link:link,issue:issue,user:user},
            success:(d)=>{
                if(d=="200"){
                    $("#res").html("Your problem is recorded.<br>You'll hear from us soon.");
                    $("#res").css('color','green');
                    $("#name").val('');
                    $("#link").val('');
                    $("#issue").val('');
                }else{
                    $("#res").html("Failed registering your issue.<br>Please try later or enter valid credentials.");
                    $("#res").css('color','red');
                }

            }
        });
    });

    $("#wrk").click(()=>{
        let ename = $("#ename").val();
        let topic = $("#topic").val();
        let req = $("#req").val();

        $.ajax({
            url:'api/workshop.php',
            method:'POST',
            data:{ename:ename,topic:topic,req:req,user:user},
            success:(d)=>{
                if(d=="200"){
                    $("#res2").html("Your suggestion / response is recorded.<br>You'll hear from us soon.");
                    $("#res2").css('color','green');
                    $("#ename").val('');
                    $("#topic").val('');
                    $("#req").val('');
                }else{
                    $("#res2").html("Failed registering your response.<br>Please try later.");
                    $("#res2").css('color','red');
                }

            }
        });
    });
});