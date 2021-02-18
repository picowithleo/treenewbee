        </div>

    

    </body>
    
    <footer class="footer  mt-auto py-3">


 
        <table class="table">
            <tbody>

                <tr class="table-primary text-center">
                    <td></td>
                    <td>Jinyuan Chen</td>
                    <td></td>
                 </tr>
                 <tr class="table-primary text-center">
                    <td></td>
                    <td>s4575810</td>
                    <td></td>
                 </tr>
                 <tr class="table-primary text-center">
                    <td>INFS3202/INFS7202 Web Information Systems</td>
                    <td>Copyright©2020</td>
                    <td>1st May 2020</td>
                 </tr>
    
            </tbody>
        </table>
   
    
   
    <script>
        var chat_appid = '54650';
        var chat_auth = '6de047037463f2507748cb23b4883e82';
    </script>
    <?php if($this->session->userdata('id') && $this->session->userdata('id') > 0) { ?>
    <script>
        var chat_id = "<?php echo $this->session->userdata('id'); ?>";
        var chat_name = "<?php echo $user->username; ?>"; 
        var chat_link = "<?php echo base_url(); ?>profile/index"> //Similarly populate it from session for user's profile link if exists
        var chat_avatar = "<?php $user->avatar; ?>"; //Similarly populate it from session for user's avatar src if exists
        var chat_friends = '<?php echo $this->session->userdata('friends'); ?>'; //Similarly populate it with user's friends' site user id's eg: 14,16,20,31
        </script>
    <?php } ?>
    <script>
    (function() {
        var chat_css = document.createElement('link'); chat_css.rel = 'stylesheet'; chat_css.type = 'text/css'; chat_css.href = 'https://fast.cometondemand.net/'+chat_appid+'x_xchat.css';
        document.getElementsByTagName("head")[0].appendChild(chat_css);
        var chat_js = document.createElement('script'); chat_js.type = 'text/javascript'; chat_js.src = 'https://fast.cometondemand.net/'+chat_appid+'x_xchat.js'; var chat_script = document.getElementsByTagName('script')[0]; chat_script.parentNode.insertBefore(chat_js, chat_script);
    })();
    </script>

</footer>
</html>