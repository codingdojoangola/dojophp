$(function(){
  $('#followbtn').on('click', function(e){
    e.preventDefault();
    $('#followbtn').fadeOut(300);
    
    $.ajax({
      url: 'php/ajax-follow.php',
      type: 'post',
      data: {'action': 'follow', 'userid': '11239528343'},
      success: function(data, status) {
        if(data == "ok") {
          $('#followbtncontainer').html('<p><em>Following!</em></p>');
          var numfollowers = parseInt($('#followercnt').html()) + 1;
          $('#followercnt').html(numfollowers);
        }
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    }); // end ajax call
  });
  
  $('body').on('click', '#morefllwrs', function(e){
    e.preventDefault();
    var container = $('#loadmorefollowers');
    
    $(container).html('<img src="img/loader.gif">');
    var newhtml = '';
    
    $.ajax({
      url: 'php/ajax-followers.php',
      type: 'post',
      data: {'page': $(this).attr('href')},
      cache: false,
      success: function(json) {
        $.each(json, function(i, item) {
          if(typeof item == 'object') {
          newhtml += '<div class="user"> <a href="#" class="clearfix"> <img src="'+item.profile_pic+'" class="avi"> <h4>'+item.username+'</h4></a></div>';
          } 
          else {
            return false;
          }
        }) // end $.each() loop
        
        if(json.nextpage != 'end') {
          // if the nextpage is any other value other than end, we add the next page link
          $(container).html('<a href="'+json.nextpage+'" id="morefllwrs" class="bigblue thinblue">Load more followers</a>');
        } else {
          $(container).html('<p></p>');
        }
        
        $('#followers').append(newhtml);
      },
      error: function(xhr, desc, err) {
        console.log(xhr + "\n" + err);
      }
    }); // end ajax call
  });
});