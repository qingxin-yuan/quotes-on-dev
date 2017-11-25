(function($){

  $('#new-quote-button').on('click', function(event) {
    event.preventDefault();
    
    //METHOD TO TRTRIVING DATA FROM DATABASE
    $.ajax({
       method: 'get',
       url: api_vars.root_url + 'wp/v2/posts/?filter[orderby]=rand&filter[posts_per_page]=1'
       
      //  beforeSend: function(xhr) {
      //     xhr.setRequestHeader( 'X-WP-Nonce', api_vars.wpapi_nonce );
      //  }
    }).done( function(data) {
      $('.source').text('');
      // $('.comma').text('');
      data = data.shift();
      // console.log(data);
      // console.log(data.title.rendered);
      // console.log(data._qod_quote_source);

      history.pushState(null, null, data.slug);//change the slug of each quote


      $('.entry-content').children().html(data.content.rendered);
      $('.entry-title').text(data.title.rendered).prepend('&mdash;');
      

      if (data._qod_quote_source_url && data._qod_quote_source){
        $('.source').append(', <a href="'+ data._qod_quote_source_url + '">' + data._qod_quote_source + '</a>');
      }
      else if (data._qod_quote_source){
        $('.source').append(', '+ data._qod_quote_source);
      }
      
    })
    .fail(function(){
      console.log('your request can not be processed!');
    });

 });
//  console.log( $('#quote_author').val() );
  $('#submit-button').on('click', function(event) {
    event.preventDefault();
   
    // var author = String($('#quote-author').val());
    // console.log(author);
    $.ajax({
      method: 'post',
      url: api_vars.root_url + 'wp/v2/posts',
      data:{

        "status": "publish",
        "title":$('#quote-author').val() ,
        "content": $('#quote-content').val(),
        "_qod_quote_source": $('#quote-source').val(),
        "_qod_quote_source_url": $('#quote-source-url').val()

      },
      beforeSend: function(xhr) {
          xhr.setRequestHeader( 'X-WP-Nonce', api_vars.nonce );
      }
    })
    .done(function(){
      $('.submit-success-message').text('Your quote submission is success!');
    })
    .always(function(){
      $("#quote-submission-form").trigger('reset');
    });
  });

  $("#quote-author, #quote-content").focus(function(event){
    event.preventDefault();
    $('.submit-success-message').empty();
  })

})(jQuery);