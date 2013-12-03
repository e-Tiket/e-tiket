function getId(){
    var a=new Date();
    return(a.getHours()+''+a.getMinutes()+''+a.getSeconds()+''+a.getMilliseconds());
}
//function load_new_notification(){
//    $.ajax({
//        url:site_url()+'/notification/count_notification',
//        cache: false,
//        dataType: 'html',
//        type:'POST',
//        success:function (data){
//            data=jQuery.parseJSON(data);
//            if(data.jumlah>parseInt($('.notif_count').html())){
//                $('.notif_count').html('<font style="color: red">'+data.jumlah+'</font>');
//            }else{
//                $('.notif_count').html(''+data.jumlah+'');
//            }
//            
//        }
//    });
//}
//
//$(document).everyTime(5000,'load_notification',function(){
//    load_new_notification();
//});
$(document).everyTime(5000,'load_notification',function(){
//    noticeNotification('tes notifikasi');
    $.ajax({
        url:site_url()+'/notificationAdmin/getNew?last_notif='+LAST_NOTIF,
        cache: false,
        dataType: 'html',
        type:'POST',
        success:function (data){
            data=$.parseJSON(data);
            if(data.length>0)
                LAST_NOTIF=data[0].waktu;
            var str='';
            var warna;
            for(var i=0;i<data.length;i++){
                if(data[i].read_by==null || data[i].read_by==''){
                    warna='style="background-color: #f1f1f1"';
                }else
                    warna='';
                
                str+='<li '+warna+'><a href="'+base_url()+'/notificationAdmin/viewNotif?id='+data[i].id+'"><span class="icon-user"></span>'+data[i].message+'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>'+data[i].waktu+'</small></a></li>';
            }
            $('#notificationCount').html(($('#notificationCount').html()*1)+data.length);
            $('#notificationList').prepend(str);
        }
    });
});
function noticeNotification(pesan){
    
    var id=getId();
    $('#notificationList').append(
        '<li><a href="#"><span class="icon-envelope"></span> notif baru <strong>Jack</strong> <small class="muted"> - 19 hours ago</small></a></li>'
        );
//    $('#notice_notification'+id+'').stickyfloat();
//    $('#notice_notification'+id+'').fadeIn().delay(10000).fadeOut(function(){
//        $(this).remove();
//    });
}