	
<style>
	.category-tree{
		height: 400px;
		width: 40%;
		border: 1px solid #ccc;
	}
</style>
	<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a javascript::void(0);>Manage Category</a>
				</li>
			</ul><!-- /.breadcrumb -->
		</div>

		<div class="page-content">
			<div class="row">
				<!-- <div class="col-xs-6 category-tree">
					<button type="button" class="btn btn-sm btn-success"><i class="ace-icon fa fa-plus"></i> Add Root Category</button>
					<button type="button" class="btn btn-sm btn-success"><i class="ace-icon fa fa-plus"></i> Add Sub Category</button>
					<ul class="x-node-tree">
						<li>
							<a javascript::void(0); data-element-id="1" class="node-link">men</a>
							<ul class="x-node-tree">
								<li>
									<a javascript::void(0); data-element-id="2" class="node-link">Clothes</a>
									<ul class="x-node-tree">
										<li><a javascript::void(0); data-element-id="3" class="node-link">Jeans</a></li>
										<li><a javascript::void(0); data-element-id="4" class="node-link">Shirt</a></li>
									</ul>	
								</li>
							</ul>	
						</li>
					</ul>
				</div>
 -->				

 				<div class="col-sm-6">
					<div class="widget-box widget-color-blue2">
						<div class="widget-header">
							<h4 class="widget-title lighter smaller">Categories</h4>
						</div><BR>
						<button type="button" id="add_root_category_button" class="btn btn-sm btn-success"><i class="ace-icon fa fa-plus"></i> Add Root Category</button>
						<button type="button" id="add_sub_category_button" class="btn btn-sm btn-success"><i class="ace-icon fa fa-plus"></i> Add Sub Category</button>
						<div class="widget-body">
							<div class="widget-main padding-8">
								<!-- <?php pr($root_category);?> -->
								<ul id="tree" class="tree tree-unselectable" role="tree">
									<?php foreach($root_category as $category):
										$children_count = $category['children_count'];
										$category_parent_id = $category['parent_id'];
										$category_id = $category['id'];
										$name = $category['name'];
										$is_active = $category['is_active'];
										
									?>
									<?php if($children_count>0):?>
									<li class="tree-branch" role="treeitem" aria-expanded="false">
										<i class="icon-caret ace-icon tree-plus tree-children" data-element-id="<?php echo $category_id?>"></i>
										<div class="tree-branch-header">
											<span class="tree-branch-name">
											<i class="icon-folder red ace-icon fa fa-folder"></i>
											<span class="tree-label node-link" data-element-id="<?php echo $category_id?>"><?php echo $name?></span></span>
										</div>
										<ul class="tree-branch-children" role="group"></ul>
										<div class="tree-loader hidden" role="alert">
											<div class="tree-loading"><i class="ace-icon fa fa-refresh fa-spin blue"></i></div>
										</div>
									</li>
									<?php else:?>
									<li class="tree-item" role="treeitem"><i class="icon-folder red ace-icon fa fa-folder"></i><span class="tree-item-name"><span class="tree-label node-link" data-element-id="<?php echo $category_id?>"><?php echo $name?></span></span></li>
									<?php endif;?>
									<?php endforeach;?>
								</ul>
							</div>
						</div>
					</div>
				</div>	
				<div class="col-xs-6">
					<!-- PAGE CONTENT BEGINS -->
					<?php echo $this->Flash->render() ?>
					<?php echo $this->Form->create('',['class'=>"form-horizontal","id"=>"category_form"]) ?>
						<input type="hidden" name="parent_id" id="parent_id">
						<input type="hidden" name="category_id" id="category_id">
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Category Name*</label>

							<div class="col-sm-9">
								<input type="text" id="name" name="name" placeholder="Default Category" class="col-xs-10 col-sm-5" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Is Active*</label>
							<div class="col-sm-9">
								<select id="is_active" name="is_active" class="required-entry required-entry select">
									<option value="1">Yes</option>
									<option value="0" selected="selected">No</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="form-actions left">
								<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>
								<button type="submit" name="save" value="save" class="btn btn-sm btn-success">
									Save Category
									<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
								</button>
								<button type="submit" name="delete" value="delete" class="btn btn-sm btn-danger">
									Delete Category
									<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
								</button>
							</div>	
						</div>
					</form>
				</div>
				
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

<script type="text/javascript">
	$(function(){
		$(document).on('click','.node-link',function(){
			cat_id = $(this).attr('data-element-id');
			$('li').removeClass('tree-selected');
			$(this).closest('li').addClass('tree-selected');

			if($(this).hasClass('x_tree_selected') == false){
				$('span').removeClass('x_tree_selected');
				$(this).addClass('x_tree_selected');
			}
			var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
			$.ajax({
				headers: {
			        'X-CSRF-Token': csrfToken
			    },
				url:"<?php echo $this->url->Build(['controller'=>'category','action'=>'getCategoryData'])?>",
				type:'post',
				data:{'cat_id':cat_id},
				success:function(res){
					category = JSON.parse(res);
					$("#name").val(category.name);
					$("#is_active").val(category.is_active);
					$("#category_id").val(category.id);
					console.log(category.name);
				}
			});
		});
		$(document).on('click','.tree-children',function(){
			cat_id = $(this).attr('data-element-id');
			element = $(this);
			x_tree_expended = true;
			if($(this).hasClass('x_tree_expended') == true){
				x_tree_expended = false;
			}
			if($(this).hasClass('x_tree_expended') == false){
				$(this).addClass('x_tree_expended');
			}
			
			console.log(x_tree_expended);
			if(x_tree_expended == true){
				$(element).siblings('.tree-loader').removeClass('hidden');
				var csrfToken = <?php echo json_encode($this->request->getParam('_csrfToken')) ?>;

				$.ajax({
					headers: {
				        'X-CSRF-Token': csrfToken
				    },
					url:"<?php echo $this->url->Build(['controller'=>'category','action'=>'subCategoryTree'])?>",
					type:'post',
					data:{'cat_id':cat_id},
					success:function(res){
						$(element).siblings('ul').html(res);
						$(element).siblings('.tree-loader').addClass('hidden');
					}
				});
			}
		});
		$(document).on('click','#add_root_category_button',function(){
			$("#category_form")[0].reset();
			$("#parent_id").val(0);
			$("#category_id").val(0);
		});
		$(document).on('click','#add_sub_category_button',function(){
			$("#category_form")[0].reset();
			$("#parent_id").val(0);
			$("#category_id").val(0);
			if($('.x_tree_selected').length > 0){
				$("#parent_id").val($('.x_tree_selected').last().attr('data-element-id'));
			}
		});
	});
</script>