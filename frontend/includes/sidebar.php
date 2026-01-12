<?php
    $stmt = $pdo->prepare("SELECT * FROM categories ORDER BY id desc");
    $stmt->execute();
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="card p-4 mb-4" data-aos="fade-left">
                    <h5 class="widget-title">Categories</h5>
                    <div class="category-list">
                        <?php foreach ($categories as $category): ?>
                        <a href="#" class="category-link"><span><?php echo $category['name'] ?></span> <span class="badge bg-light text-dark">12</span></a>
                       <?php endforeach?>
                    </div>
                </div>

                <div class="card p-4 mb-4 sticky-top" style="top: 90px;" data-aos="fade-left">
                    <h5 class="widget-title">Recent Blogs</h5>

                    <a href="#" class="recent-post-item">
                        <img src="https://picsum.photos/id/1/200" class="recent-post-img" alt="thumb">
                        <div>
                            <p class="recent-post-title">Mastering Bootstrap 5</p>
                            <span class="recent-post-date">Dec 28, 2024</span>
                        </div>
                    </a>

                    <a href="#" class="recent-post-item">
                        <img src="https://picsum.photos/id/2/200" class="recent-post-img" alt="thumb">
                        <div>
                            <p class="recent-post-title">AI Content Writing Tips</p>
                            <span class="recent-post-date">Dec 25, 2024</span>
                        </div>
                    </a>

                    <a href="#" class="recent-post-item">
                        <img src="https://picsum.photos/id/3/200" class="recent-post-img" alt="thumb">
                        <div>
                            <p class="recent-post-title">CSS Grid vs Flexbox</p>
                            <span class="recent-post-date">Dec 20, 2024</span>
                        </div>
                    </a>
                </div>
