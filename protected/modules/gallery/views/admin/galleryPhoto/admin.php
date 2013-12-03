<div class="mediamgr">
            	<div class="mediamgr_left">
                	<div class="mediamgr_head">
                    	<ul class="mediamgr_menu">
                        	<li><a class="btn prev prev_disabled"><span class="icon-chevron-left"></span></a></li>
                            <li><a class="btn next"><span class="icon-chevron-right"></span></a></li>
                            <li class="marginleft15"><a class="btn selectall"><span class="icon-check"></span> Select All</a></li>
                            <li class="marginleft15 newfoldbtn"><a class="btn newfolder" title="Add New Folder"><span class="icon-folder-open"></span></a></li>
                            <li class="marginleft5 trashbtn"><a class="btn trash" title="Trash"><span class="icon-trash"></span></a></li>
                            <li class="marginleft15 filesearch">
                            	<form>
                            		<input type="text" id="filekeyword" class="filekeyword" placeholder="Search file here" />
                                </form>
                            </li>
                            <li class="right newfilebtn">
                                <a href="<?php echo Yii::app()->createUrl($this->getModuleUrl().'/admin/galleryPhoto/create')?>" id="add-file" class="btn btn-primary">Upload New File</a>
                            </li>
                        </ul>
                        <span class="clearall"></span>
                    </div><!--mediamgr_head-->
                    
                    <div class="mediamgr_category">
                    	<ul>
                            <li class="current"><a href="#">All</a></li>
                            <?php foreach($galleryList as $gallery):?>
                            <li class="current">
                                <a href="<?php echo Yii::app()->createUrl($this->getModuleUrl().'/admin/galleryPhoto/admin',array('GalleryPhoto[id_gallery]'))?>"><?php echo $gallery['nama']?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div><!--mediamgr_category-->
                    
                    <div class="mediamgr_content">
						
                    <small><em>Tips: Hold Control key to select multiple items (Windows only).</em></small>
                        
                    <br /><br />
                    	<?php
                         $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider,
                                'itemView'=>'_view',
                                'itemsTagName'=>'ul',
                                'itemsCssClass'=>'listfile',
                            ));
                        ?>
                        <br class="clearall"/>
                        
                    </div><!--mediamgr_content-->
                    
                </div><!--mediamgr_left -->
                
                <div class="mediamgr_right">
                	<div class="mediamgr_rightinner">
                        <h4>Browse Files</h4>
                        <ul class="menuright">
                            <li class="<?php echo $this->getQuery('GalleryPhoto[id_gallery]')==''?'current':''?>"><a href="#">All Files</a></li>
                            <?php foreach($galleryList as $gallery):?>
                            <li class="<?php echo $this->getQuery('GalleryPhoto[id_gallery]')==$gallery['id']?'current':''?>">
                                <a href="<?php echo Yii::app()->createUrl(
                                        $this->getModuleUrl().'/admin/galleryPhoto/admin',
                                        array('GalleryPhoto[id_gallery]'=>$gallery['id']))?>">
                                    <?php echo $gallery['nama']?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                    </div><!-- mediamgr_rightinner -->
                </div><!-- mediamgr_right -->
                <br class="clearall" />
            </div><!--mediamgr-->
                
<script type="text/javascript">
    jQuery(document).ready(function(){
                                    
        //Replaces data-rel attribute to rel.
        //We use data-rel because of w3c validation issue
        jQuery('a[data-rel]').each(function() {
            jQuery(this).attr('rel', jQuery(this).data('rel'));
        });
    });
    
    jQuery(document).ready(function(){

	// List of Files: Click to Select 
	jQuery('.listfile li').click(function(e){
		if(!e.ctrlKey && !e.cmdKey){
         	jQuery('.listfile li.selected').removeClass('selected');  
        }
		if(!jQuery(this).hasClass('selected')) {
			jQuery(this).addClass('selected');
		} else {
			jQuery(this).removeClass('selected');
		}
	});
	
	// Trash
	jQuery('.trash').click(function(){
		var count = 0;
		var items = new Array();
		jQuery('.listfile li').each(function(){
			if(jQuery(this).hasClass('selected')) {
				items[count] = jQuery(this);
				count++;
			}
		});
		if(items.length > 0) {
			var msg = (items.length > 1)? 'files' : 'file';
			if(confirm('Delete '+items.length+' '+msg+'?')) {
				for(var a=0;a<count;a++) {
					jQuery(items[a]).fadeOut(function(){
                                                $.ajax($(this).children('input.delete-url').attr('value')+'?ajax=1')
                                                .done(function() {
                                                  jQuery(this).remove();
                                                })
                                                .fail(function() {
                                                  alert( "error" );
                                                })
                                                ;
						
					});	
				}
			}
		} else {
			alert('No file selected');
		}
		return false;
	});
	
	// Colorbox
	jQuery(".listfile a, #add-file").colorbox({
             href: function(){
                return $(this).attr('href')+"?ajax=1";
            }
        });
								 
    });
</script> 