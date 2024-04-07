                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
       </div>
    </section>

    <!-- Footer Start -->
    <footer class="footer-short">
        <div class="row sidebar-content-wrapper">
            <div class="error-rows full-width">
                <p class="mb-0 text-center mt-0">Copyright <script> document.write(new Date().getFullYear());</script> © E-Rent. All Right Reserved </p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->
</div>

<script>
    $(document).ready(function () {
        $('.notification-tags').click(function (e) {
            e.preventDefault();
            var notificationId = $(this).data('notification-id');
            var url = "{{ route('mark.notification.read', ':id') }}".replace(':id', notificationId);
            var targetUrl = $(this).attr('href');

            $.ajax({
                type: 'POST',
                url: url,
                data: {_token: '{{ csrf_token() }}'},
                success: function (response) {
                    // Remove the clicked notification from the list
                    $(e.target).closest('li').remove();
                    window.location.href = targetUrl;
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
