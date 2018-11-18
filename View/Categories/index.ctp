<?php
$this->start('title');
echo "Categories |";
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
     foreach($categories as $category){

        echo '<button id="'.str_replace(' ', '_', $category['Category']['name']).'" class="box">';
        echo $category['Category']['name'];
        echo '</button>';
     }

?>  </div>
</div>
<?php
$this->start('ready_script');
foreach($categories as $category){

echo '  $("#'.str_replace(' ', '_', $category['Category']['name']).'").click(function(){
     window.location="/quotes/categories/'.str_replace(' ','_',$category['Category']['name']).'";
});';

}


$this->end();
?>