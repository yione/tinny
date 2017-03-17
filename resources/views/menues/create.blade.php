<style>
    .content-one {
        margin-top: 8px;
        margin-left: 10px;
    }
    
    .content-one a {
        line-height: 14px;
        font-size: 14px;
        color: #000;
        position: relative;
        top: -8px;
        left: 14px;
    }
    
    .content-one a:hover {
        color: #d51323;
    }
    
    .content-one span {
        font-size: 40px;
        line-height: 0px;
    }
</style>
<div id="right" style="height:auto;">
    <!--#include file="/section/org/185.html"-->
    <div class="right-border">
        <div class="ielts-subtitle">
            <img src="http://uimg.gximg.cn/v/res/201703/01-11/ielts-icon1.png">
            <h2>雅思考试攻略</h2>
        </div>
        <p class="content-one">
            <?php
            $data = UtlsSvc::simpleRequest('http://www.guixue.com/section/org/172.json?v=' . mt_rand(0, 99999));
            $data = json_decode($data, true);
            $all = $data['all']['val'];
                
            foreach ($data as $k => $item) {
            if ($k == 'all') {
                continue;
            }
            $i = 0;
            foreach ($item['val'] as $v) {
            if ($i > 2) {
                continue;
            }
            $i++;
            ?>
            <span>.</span><a href="<?php echo $v['url'];?>" style="display:block;width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;top:-18px" target="_blank">
                <?php echo $v['title'];?>
            </a>
            <?php   }
                
            } ?>
        </p>
    </div>
    <div style="height:304px;" class="right-border">
        <div class="ielts-subtitle">
            <img src="http://uimg.gximg.cn/v/res/201703/01-11/ielts-icon2.png">
            <h2>开班通知</h2>
        </div>
        <ul class="content-two">
            <?php
            $data = UtlsSvc::simpleRequest('http://www.guixue.com/section/org/168.json?v=' . mt_rand(0, 99999));
            $data = json_decode($data, true);
            foreach($data['ielts'] as $k=>$v){
            if ($k > 9) {
                break;
            }
            ?>
            <li>
                <a class="class-name" href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a>
            </li>
            <?php }
            foreach($data['toefl'] as $v){?>
            <li>
                <a class="class-name" href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?></a>
            </li>
            <?php }?>
        </ul>
    </div>
    <div class="right-border">
        <div class="ielts-subtitle">
            <img src="http://uimg.gximg.cn/v/res/201703/01-11/ielts-icon3.png">
            <h2>学员成绩展示</h2>
        </div>
        <p class="content-three">
            <?php
            $data = UtlsSvc::simpleRequest('http://www.guixue.com/section/org/177.json?v=' . mt_rand(0, 99999));
            $data = json_decode($data, true);
            foreach($data as $v){?>
            <a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['title'];?>
                ：<?php echo $v['stitle'];?></a><br/>
            <?php }?>
        </p>
    </div>
</div>