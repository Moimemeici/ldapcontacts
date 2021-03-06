<?php
// javascript
script( 'ldapcontacts', [ 'settings', 'statistics', 'Chart.min' ] );
// style
style( 'ldapcontacts', [ 'settings', 'statistics' ] );
?>
<div id="ldapcontacts">
	<div class="section">
		<h2><?php p($l->t( 'LDAP Contacts' )); ?></h2>
        
        <script id="ldapcontacts-general-settings-tpl" type="text/x-handlebars-template">
            <table>
                <tbody>
                    <tr>
                        <td><label for="ldapcontacts_form_login_attribute"><?php p($l->t( 'Login Attribute' )); ?></label></td>
                        <td><input type="text" id="ldapcontacts_form_login_attribute" name="login_attribute" placeholder="<?php p($l->t( 'Login Attribute' )); ?>" value="{{ settings.login_attribute }}"></td>
                    </tr>                    
                    <tr>
                        <td><label for="ldapcontacts_form_edit_login_url"><?php p($l->t( 'Edit Login URL' )); ?></label></td>
                        <td><input type="url" id="ldapcontacts_form_edit_login_url" name="edit_login_url" placeholder="<?php p($l->t( 'URL' )); ?>" value="{{ settings.edit_login_url }}"></td>
                    </tr>
                </tbody>
            </table>
            
            <button type="submit"><?php p($l->t( 'Save' )); ?></button>
        </script>
		
        <div id="ldapcontacts-general-settings"><span class="icon-loading"></span></div>
        <span id="ldapcontacts-settings-msg" class="msg"></span>
		<br>
		
		<!-- show and hide users section -->
		<script id="ldapcontacts-edit-user-tpl" type="text/x-handlebars-template">
			<div class="search-container">
				<span class="search"><input type="search" id="ldapcontacts-search-visible" placeholder="<?php p($l->t('hide user')); ?>"><span class="abort"></span></span>
				<div class="search-suggestions"></div>
			</div>
			
			{{#if hidden}}
				<div class="container">
					{{#each hidden}}
						<span class="edit-user">
							<span class="name">{{ name }}</span><span class="remove" target-id="{{ id }}">X</span>
						</span>
					{{/each}}
				</div>
			{{else}}
				<b><?php p($l->t('No users are hidden')); ?></b>
			{{/if}}
		</script>
		
		<br><h3><?php p($l->t('Hidden Users')); ?></h3><span id="ldapcontacts-edit-user-msg" class="msg"></span>
		<div id="ldapcontacts-edit-user"><div class="icon-loading"></div></div>
		
		<br>
		
		<!-- show and hide groups section -->
		<script id="ldapcontacts-edit-group-tpl" type="text/x-handlebars-template">
			<div class="search-container">
				<span class="search"><input type="search" id="ldapcontacts-search-groups-visible" placeholder="<?php p($l->t('hide group')); ?>"><span class="abort"></span></span>
				<div class="search-suggestions"></div>
			</div>
			
			{{#if hidden}}
				<div class="container">
					{{#each hidden}}
						<span class="edit-group">
							<span class="name">{{ cn }}</span><span class="remove" target-id="{{ id }}">X</span>
						</span>
					{{/each}}
				</div>
			{{else}}
				<b><?php p($l->t('No groups are hidden')); ?></b>
			{{/if}}
		</script>
		
		<br><h3><?php p($l->t('Hidden Groups')); ?></h3><span id="ldapcontacts-edit-group-msg" class="msg"></span>
		<div id="ldapcontacts-edit-group"><div class="icon-loading"></div></div>
        
        <h3><?php p($l->t( 'Statistics' )); ?></h3>
    
        <script id="ldapcontacts-stat-tpl" type="text/x-handlebars-template">
            <div class="stat">
                <h2 class="title">{{ title }}</h2>

                <canvas id="{{ id }}"></canvas>

                {{#if total}}
                    <h3 class="total"><?php p($l->t( 'Total:' )); ?> {{ total }}</h3>
                {{/if}}
            </div>
        </script>

        <div id="ldapcontacts-stats"><div class="icon-loading"></div></div>
	</div>
</div>