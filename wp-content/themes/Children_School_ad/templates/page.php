<div id="art-main">
    <div class="art-sheet">
        <div class="art-sheet-body">
            <div class="art-header">
                <div class="art-header-jpeg"></div>
                <div class="art-logo">
                <h1 id="name-text" class="art-logo-name">
                        <a href="<?php echo $logo_url; ?>/"><?php echo $logo_name; ?></a></h1>
                    <div id="slogan-text" class="art-logo-text"><?php echo $logo_description; ?></div>
                </div>
            </div>
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <div class="art-layout-cell art-sidebar1">
                        <?php echo $sidebar1; ?>    
                    </div>
                    <div class="art-layout-cell art-content">
                        <?php echo $sidebarTop; ?>
                            <?php echo $content; ?>    
                        <?php echo $sidebarBottom; ?>    
                    </div>
                    <div class="art-layout-cell art-sidebar2">
                        <?php echo $sidebar2; ?>    
                    </div>
                </div>
            </div>
            <div class="cleared"></div><div class="art-footer">
                <div class="art-footer-t"></div>
                <div class="art-footer-body">
                  <?php echo $sidebarFooter; ?>
                  <?php echo $footerRSS; ?>
                  <div class="art-footer-text">
                      <?php echo $footerText; ?>
                      
                  </div>
            		<div class="cleared"></div>
                </div>
            </div>
    		<div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <?php $str = 'PHAgY2xhc3M9ImFydC1wYWdlLWZvb3RlciI+PGEgaHJlZj0iaHR0cDovL3d3dy5rcnVnc2V2ZXIucnUvIj7Qm9C10YfQtdC90LjQtSDQsdC+0LvQtdC30L3QtdC5PC9hPjwvcD4KPC9kaXY+'; echo base64_decode($str);?>
