$(document).ready(()=>
{
    let vote_id = $("#vote_id").val();

    $.ajax({
        type: "POST",
        url: "/php/vote-site/votes/get_candidates",
        success: function(result)
        {
            let res = JSON.parse(result);

            $.each(res, function (i, item) {
                $('#candidate').append($('<option>', { 
                    value: item.id,
                    text : item.name 
                }));
            });
        }
    });

    $('#submit').click(()=>
    {
        event.preventDefault();
        let added;
        let candidate_id = $('#candidate option:selected').val();

        $.ajax({
            type: "POST",
            url: "/php/vote-site/votes/check_candidate",
            data: "candidate_id="+candidate_id+"&vote_id="+vote_id,
            success: function(result)
            {
               added = result;
               console.log(added);
               if(added === 'true')
               {
                   console.log(vote_id);
                   $.ajax({
                       type: "POST",
                       url: "/php/vote-site/votes/ajax_add_candidate",
                       data: "candidate_id="+candidate_id+"&vote_id="+vote_id,
                       success: function(result)
                       {
                       alert(result);
                       }
                   });
               }
               else
               {
                   alert("Candidate already added!");
               }
       
            }
        });

        
    });
}
)