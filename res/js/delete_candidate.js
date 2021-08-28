$(document).ready(() => {
    let vote_id = $("#vote_id").val();

    $.ajax({
        type: "POST",
        url: "/php/vote-site/votes/get_candidates_by_vote_id",
        data:"vote_id="+vote_id,
        success: function (result) {
            let res = JSON.parse(result);
            console.log(res);
            $.each(res, function (i, item) {
                $('#candidate').append($('<option>', {
                    value: item.id,
                    text: item.name
                }));
            });
        }
    });

    $('#submit').click(() => {
        event.preventDefault();
        let candidate_id = $('#candidate option:selected').val();

        $.ajax
        ({
            type: "POST",
            url: "/php/vote-site/votes/ajax_del_candidate",
            data: "candidate_id=" + candidate_id + "&vote_id=" + vote_id,
            success: function (result) {
                alert(result);
                document.location.reload();
            }
        });






    });
}
)