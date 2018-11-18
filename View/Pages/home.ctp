                                    <div class="content">
                                        <header>
                                            <h1>Random Quote
                                        </h1>
                                           
<div class="quote"><span class = "saying"></span><span class = "author"></span></div> 
                                        <br/>
                                        <ul class="actions">
                                            <li><button id="firebreath" class="button big">Reload</button></li>
                                        </ul>
                                    </div>
                                    <span class="image object" id="dragon">
                                        <img src="/assets/images/dragon.png" alt="" />
                                    </span>
<?php
$this->start('generate_js');
echo "generate();";
echo   "function generate(){
     $.ajax( {
      url: 'http://wisy.dev/quotes/random',
      success: function(data) {
       $('.saying').html(data.content);
       $('.author').html(data.author);
 
        }
      ,
      error: function(data){
        console.log(data);

      },
    cache: false
    });
  }";
  $this->end();

  ?>


 
