<?php require '../src/Views/templates/head.php'?>

<!-- Page content-->
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
        <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    <!-- Post title-->
                    <h1 class="fw-bolder mb-1"><?= htmlspecialchars($viewData['input']['title']); ?></h1>
                        <!-- Post meta content-->
                        <div class="text-muted fst-italic mb-2">Posted on <?= htmlspecialchars(date('Y-m-d, h:i A', strtotime($viewData['input']['updated_at'])))?> by <?= htmlspecialchars($viewData['input']['username'])?></div>
                </header>
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="https://dummyimage.com/900x400/ced4da/6c757d.jpg" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <p class="fs-5 mb-4"><?= htmlspecialchars($viewData['input']['description']) ?></p>
                </section>
            </article>
        </div>       
    </div>
</div>
<?php require '../src/Views/templates/foot.php'?>
