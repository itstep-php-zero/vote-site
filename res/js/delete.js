$(document).ready(()=>
{

    $('.delete-item').click(()=>
    {
        if (!confirm('You sure you want to delete this ')) {
            event.preventDefault();
        }
    });
}
)