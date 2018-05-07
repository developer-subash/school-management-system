<h2>    hello man</h2>

<?php 

$sql = $this->db->get_where('exam_grade',array('id'=>$param2))->row();

print_r($sql);

?>