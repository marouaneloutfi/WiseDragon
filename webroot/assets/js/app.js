 $( document ).ready(function() {
    generate();

  function generate(){
  	 $.ajax( {
      url: 'http://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1',
      
      success: function(data) {
        var post = data.shift(); 
       $('.saying').text(post.content);
       $('.author').text(post.title);
       cosole.log('data');
 
        }
      ,
      error: function(data){
      	console.log(data);

      }
      cache: false
    });
  }





  
$("#firebreath").on( "click", function() {
    generate();
});  
  
});