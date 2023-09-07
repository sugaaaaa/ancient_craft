$(document).ready(function(){
    //update CMS page status
    $(document).on("click",".updateCmsPageStatus",function(){
        var status = $(this).children("i").attr("status");
        var page_id = $(this).attr("page_id");
        alert(page_id);
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="crsf-token"]').attr('content')
            },
            type: 'post',
            url:'/admin/update-cms-pages-status',
            data:{status:status,page_id:page_id},
            success:function(resp){
                if(resp['status']==0){
                    $("#page-"+page_id).html("<i class='fa-solid fa-toggle-off' style='color:grey' status='Inactive'></i>");
                }else if(resp['status']==1){
                    $("#page-"+page_id).html("<i class='fa-solid status='Inactive'></i>") 
                }
               
            },error:function(){
                alert("Error");
            }
        })
    })
});