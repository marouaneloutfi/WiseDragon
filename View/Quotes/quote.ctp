<?php
$this->start('title');
echo $title." |";
$this->end();
?>
                                    <div class="content">
                                        <header>
                                            <h1><?php echo ucwords($title); ?> Quotes
                                        </h1>
                                           
<div class="quote"><span class = "saying"><?php echo $quote['Quote']['content']; ?></span><span class = "author"><?php if(isset($quote['Author']['name'])) { echo $quote['Author']['name']; } ?></span> </div> 
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
echo   "function generate(){
     $.ajax( {
      url: '/quotes/".$type."/".str_replace(' ', '_', $title)."',
      success: function(data) {
        
       $('.saying').html(data.content);
       $('.author').html(data.author);
       console.log(data);
       
 
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