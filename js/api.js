(function($){

  $('#new-quote-button').on('click', function(event) {
    event.preventDefault();
    
    
    $.ajax({
       method: 'get',
       url: api_vars.root_url + 'wp/v2/posts/?filter[orderby]=rand&filter[posts_per_page]=1',
       
      //  beforeSend: function(xhr) {
      //     xhr.setRequestHeader( 'X-WP-Nonce', api_vars.wpapi_nonce );
      //  }
    }).done( function(data) {

      data = data[0];
      console.log(data);
      console.log(data.title.rendered);
      console.log(data.slug);
      history.pushState(null, null, data.slug);//change the slug of each quote
      $('.entry-content').children().html(data.content.rendered);
      $('.entry-title').text(data.title.rendered).prepend('&mdash;');
      $('.source').children().text(data._qod_quote_source);
      $('.source').children().attr('href',data._qod_quote_source_url);
    });
 });



})(jQuery);