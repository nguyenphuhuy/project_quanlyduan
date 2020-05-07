<?php 
    function cate_parent($data,$parent=0,$str="--",$select=0){
    foreach($data as $value){
        $id=$value['id'];
        $name=$value['name'];
        if ($value['parent_id']==$parent) {
            // sẽ chọn dc cái selected theo id minh muốn
            if ($select!=0 && $id=$select) {
                echo "<option value='$id' selected=''>$str $name</option>";
            }else{
                echo "<option value='$id'>$str $name</option>";
            }
            // đệ quy đến các tk con 
            cate_parent($data,$id,$str."--");
        }
        // nếu như không còn $value['parent_id']==$parent nữa thì nó sẽ nhảy ra thằng cha tiếp theo 
    }
}

?>