<!-- Modal -->
<div class="modal fade" id="modalSearchForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  
  <div class="modal-dialog" role="document">

    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php bloginfo('siteurl'); ?>" id="searchform" method="get">
            <div>
                <input type="text" id="s" name="s" value="" />
                
                <input type="submit" value="" id="searchsubmit" />
            </div>
        </form>
      </div>

    </div>

  </div>

</div>