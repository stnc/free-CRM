<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

        function show_menu()
        {
        $ci = get_instance();
        $ci->load->database();
               
        // getting the homepage ID    
        $query = $ci->db->query("SELECT  home_page FROM settings");    
        $row = $query->row();
        $homepage_id = $row->home_page;
        
        $sql = $ci->db->query("SELECT name, slug, id, parent FROM articles WHERE id  != $homepage_id  AND visible = 'Yes' ORDER BY page_order ASC");
        
        foreach ($sql->result() as $menu) {
            ?>
            
        		<li class="<?php echo $menu->slug; echo ($menu->slug == $ci->uri->segment(1)) ? " current_page_item" : ""; ?>">
        		<a href="<?php echo base_url();?><?php echo $menu->slug;?>">	
        		<?php echo $menu->name; ?>
        		</a>
        		
        		<?php $parent = $ci->db->query("SELECT name, slug, id, parent FROM articles WHERE parent = $menu->id ORDER BY page_order ASC "); ?>
        		<?php if($parent->num_rows() > 0 ): ?>
            	
        		<?php // second ul ?>	
        		<ul class="secondul">
        		<?php foreach( $parent->result() as $second ): ?>	
                		<li class="<?php echo $second->slug;?> ">
                		<a href="<?php echo base_url() . $second->slug; ?>"> <?php echo $second->name; ?></a>
                		</li>
        	<?php endforeach; ?>
        		</ul>
        		
        	    <?php endif; ?>
        		
        	<?php // end second url ?>    
        		</li>
            	
        		<?php
			}
            
    }
    
    
    
    
