<?php
$form = $this->beginWidget('GxActiveForm', array(
    'id' => 'filter-form',
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'class' => 'form-horizontal',
    ),
        ));
$key = 0;
?>

<?php $this->renderPartial("filter/_filtered", array('filter' => $filter)); ?>
-
     <div class="titleLbl">
		Narrow Select
	</div>
    <div class="brand_block">
        <?php $this->renderPartial("filter/_brand", array('filter' => $filter, 'form' => $form)); ?>
    </div>
    <div class="brand_block">
        <?php $this->renderPartial("filter/_attr", array('filter' => $filter, 'form' => $form)); ?>
    </div>

<?php echo $form->hiddenField($filter, 'sort_by'); ?>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        $.each($(".checkbox_product_page[checked]"), function(index, value) {
           
        });

        $.each($(".dropdown_product_holder"), function(index, value) {
            if ($('#Filter_sort_by').val() === "") {
                $('#Filter_sort_by').val('1');
            }

            if ($(value).attr('data-value') === $('#Filter_sort_by').val()) {
                $(value).attr('class', 'dropdown_product_holder checked_filter_active');
                $('#sort_by_name').text($(value).attr('data-name'));
            } else {
                $(value).attr('class', 'dropdown_product_holder');
            }


        });

        $(".checkbox_product_page").on("click", function() {
            $("#filter-form").submit();
        });

        $(".filter_see_all").on("click", function() {
            seeAllClick($(this))
        });

            $(".remove_from_filter").on("click", function() {
            $(".checkbox_product_page[checked][data-value='" + $(this).attr('data-value') + "']").val(0);
            $(".checkbox_product_page[checked][data-value='" + $(this).attr('data-value') + "']").click();
        });
    })

    function seeAllClick(obj) {
        var divs = obj.parent().children('.filter_none');
        obj.hide();
        see_all.push(obj.attr("data-type"));

        $.each(divs, function(index, value) {
            $(value).attr('class', 'filter');
        });
    }
</script>