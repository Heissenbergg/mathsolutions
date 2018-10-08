<!-- right menu -->
<div id="mainWrapperMenuWrapper">
    <div id="mainWrapperMenuWrapperHeader">
        <h1>Kategorije</h1>
    </div>
    <div id="mainWrapperMenuWrapperBody">
        <?php 
        $db = new DB();
        $i = 0;
        $courseQuery = $db->query("courses");
        while($cour = $courseQuery -> fetch()){ 
            if(!$cour['passed']) {?>
            <div class="mainWrapperMenuWrapperCategory mainWrapperMenuWrapperCategory<?php if($cour['id'] == $courseID) echo '0'; ?>" onclick="changeCourse('<?php echo $cour['id']; ?>','<?php echo $i++; ?>');">
                <p class="mainWrapperMenuWrapperCategoryValue"><?php echo $cour['name_of_course']; ?></p>
                <!--<i class="fa fa-plus" title="Više"></i>-->
            </div>
        <?php }
        }
        ?>
        <!--
        <div class="mainWrapperMenuWrapperCategory mainWrapperMenuWrapperCategory0" onclick="changeCourse(0);"> 
            <p class="mainWrapperMenuWrapperCategoryValue">Osnovna razina</p> -->
            <!--<i class="fa fa-plus" title="Više"></i> -->
        <!-- </div> -->
        
    </div>
</div>


<div id="mainWrapperContactForm">
                
</div>