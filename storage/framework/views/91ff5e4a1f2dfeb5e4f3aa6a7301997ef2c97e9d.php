<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('includes.message-block', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What do you have to say?</h3></header>
            <form action="<?php echo e(route('post.create')); ?>" method="post">
                <div class="form-group">
                    <textarea class="form-control" name="body" id="new-post" rows="5"
                              placeholder="New Post"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="<?php echo e(Session::token()); ?>" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>What other people say...</h3></header>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="post" data-postid="<?php echo e($post->id); ?>">
                    <p><?php echo e($post->body); ?></p>
                    <div class="info">
                        Posted by <?php echo e($post->user->firstname); ?> on <?php echo e($post->created_at); ?>

                    </div>
                    <div class="interaction">
                        <a href="#"
                           class="like"><?php echo e(\App\Http\Controllers\PostController::getText($post)); ?></a>
                        |
                        <a href="#" class="like"><?php echo e(Auth::user()->likes()->where('post_id',$post->id)->first()?Auth::user()->likes()->where('post_id',$post->id)->first()->like==0 ? 'You don\'t like this post':'Dislike':'Dislike'); ?></a>
                        <?php if($post->user==Auth::user()): ?>
                            | <a class="edit" href="#" onclick="editPost('<?php echo e($post->body); ?>')">Edit</a>﻿ |

                            <a href="<?php echo e(route('post.delete',['post_id'=>$post->id])); ?>">Delete</a>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <div class="modal fade" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">
                                Edit the Post
                            </label>
                            <textarea name="post-body" id="post-body" rows="5" class="form-control"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="savePost('<?php echo e($post->id); ?>','<?php echo e($post->body); ?>')">
                        Save changes
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var token = '<?php echo e(Session::token()); ?>';
        var urlEdit = '<?php echo e(route('edit')); ?>';
        var urlLike = '<?php echo e(route('like')); ?>';
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>