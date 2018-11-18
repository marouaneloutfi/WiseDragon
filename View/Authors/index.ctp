<?php
$this->start('title');
echo "Authors |";
$this->end();
$this->start('page_css');
echo $this->Html->css('/assets/css/list.css');
$this->end();

$this->start('paging');
    echo '<div class="paging">';
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo '  ';
        echo $this->Paginator->numbers(array('separator' => '  '));
        echo '  ';
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        echo '</div>';
    $this->end();
?>

<div class="mylist">
    <div class="mycontainer">
     <?php
     foreach($authors as $author){

        echo '<button id="'.str_replace(' ','_',$author['Author']['name']).'" class="box">';
        echo $author['Author']['name'];
        echo '</button>';
     }

?>  </div>  
</div>
<?php
$this->start('ready_script');
foreach($authors as $author){

echo '  $("#'.str_replace(' ', '_', $author['Author']['name']).'").click(function(){
     window.location="/quotes/authors/'.str_replace(' ','_',$author['Author']['name']).'";
});';

}

$this->end();
?>
