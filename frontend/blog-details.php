<!DOCTYPE html>
<html lang="en">
    <?php require_once __DIR__ . '/includes/config.php'; ?>
    <?php require_once __DIR__ . '/includes/head.php'; ?>

<body>

    <?php require_once __DIR__ . '/includes/navbar.php'; ?>


    <div class="container mt-4">
        <div class="row">

            <div class="col-lg-8">
                <article>
                    <h1 class="article-title">Web Design-er Shera 5-ti Tool ja apnar kajke shohoj korbe</h1>
                    <div class="post-meta">
                        <span><i class="far fa-user me-1"></i> Admin</span> |
                        <span><i class="far fa-calendar me-1"></i> Dec 29, 2025</span> |
                        <span><i class="far fa-comments me-1"></i> 12 Comments</span>
                    </div>

                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085" class="featured-image shadow-sm" alt="Web Design">

                    <div class="main-content">
                        <p>Web design-er jogot protiniyoto poriborton hochche. Ekjon designer hishebe apnake up-to-date thakte hobe. Aajke amra emon 5-ti tool niye kotha bolbo ja apnar workflow-ke aro fast korbe.</p>

                        <h3>1. Figma (The King of Design)</h3>
                        <p>Figma ekhon industry standard. Ete team collaboration er shubidha thakay designer ebong developer-ra ekshathe kaj korte pare.</p>

                        <blockquote class="bg-light p-4 border-start border-primary border-4 italic">
                            "Design is not just what it looks like and feels like. Design is how it works." - Steve Jobs
                        </blockquote>

                        <h3>2. Adobe Color</h3>
                        <p>Apnar website er color palette nirbachon korar jonno Adobe Color er juri nei. Ekhane apni hazaro ready-made palette paben.</p>
                    </div>

                    <div class="author-box">
                        <img src="https://i.pravatar.cc/150?u=admin" class="author-img" alt="author">
                        <div>
                            <h5 class="mb-1">Written by Tanvir Rahman</h5>
                            <p class="mb-0 text-muted small">Tanvir ekjon Senior Web Designer. Tini protiniyoto technology ebong UI/UX niye lekhalekhi koren.</p>
                        </div>
                    </div>

                    <div class="comment-section">
                        <h4 class="fw-bold mb-4">Comments (2)</h4>

                        <div class="comment-card">
                            <div class="d-flex align-items-center mb-2">
                                <h6 class="mb-0 me-2">Rahim Uddin</h6>
                                <span class="text-muted small">2 hours ago</span>
                            </div>
                            <p>Darun article! Figma niye aro kichu tutorial asha korchi.</p>
                        </div>

                        <div class="mt-5 p-4 bg-white border rounded shadow-sm">
                            <h5>Leave a Reply</h5>
                            <form>
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" placeholder="Your Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" placeholder="Email Address">
                                    </div>
                                    <div class="col-12">
                                        <textarea class="form-control" rows="4" placeholder="Write your comment..."></textarea>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary px-4" type="button">Post Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </article>
            </div>

            <div class="col-lg-4">
                <div class="widget-card card p-4 mb-4">
                    <h5 class="fw-bold border-bottom pb-2 mb-3">Popular Posts</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                <img src="https://picsum.photos/id/10/50" class="rounded me-3" alt="">
                                <span class="small fw-600">Top 10 VS Code Extensions</span>
                            </a>
                        </li>
                        <li class="mb-3">
                            <a href="#" class="text-decoration-none text-dark d-flex align-items-center">
                                <img src="https://picsum.photos/id/20/50" class="rounded me-3" alt="">
                                <span class="small fw-600">JavaScript Roadmap 2025</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="widget-card card p-4 text-center bg-primary text-white">
                    <h5>Newsletter</h5>
                    <p class="small">Subscribe krun ebong mail-e blog post pon!</p>
                    <input type="email" class="form-control mb-2" placeholder="Email">
                    <button class="btn btn-light w-100">Subscribe</button>
                </div>
            </div>

        </div>
    </div>

    <?php require_once __DIR__ . '/includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>