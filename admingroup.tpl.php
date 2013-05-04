<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title><?php echo _('Exim4U') . ': ' . _('List mailing lists'); ?></title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="ajaxLayer/phplivex.js"></script>
        <script type="text/javascript" src="translateJs.php?name=group.js"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="container">
            <?php
                require_once("ajaxLayer/group.php");
                $ajax->Run();
                include dirname(__FILE__) . '/config/header.php'; 
            ?>
     
            <div class="navbar">
                <div class="navbar-inner">
                    <ul id="menu" class="nav">
                        <li><a href="admin.php"><?php echo _('Main Menu'); ?></a></li>
                        <li><a href="logout.php"><?php echo _('Logout'); ?></a></li>
                    </ul>
                </div>
            </div>
            
            
            <div id="Content">
                <div id="mlAndGroupLists">
                    <?php //////////////////////////////////////////////// Mailing List ?>
                    <div id="mllist">
                        <h2>Simple Mailing Lists</h2>
                        <table class="mllist">
                            <thead>
                                <tr>
                                    <td> </td> 
                                    <td colspan="2" class="addmlbox"><a rel="tooltip" onclick="openAddMl()" title="<?php echo _("Add new mailing list")?>" href="#"><i class="icon-plus"></i> <?php echo _("Add new mailing list")?></a></td>
                                </tr>
                                <tr>
                                    <td> </td>  
                                    <td>Local part</td>
                                    <td>Enabled</td>
                                    <td>Content</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; foreach ($groupService->findMailingLists($domainId) as $key => $ml) { ?>
                                <tr onmouseover="showItem('m<?php echo $i?>')" onmouseout="hideItem('m<?php echo $i?>')" id="ml<?php echo $i?>">
                                    <td class="trashbox">
                                        <a href="#" onclick="confirmDeleteMl('<?php echo $ml->getName() ?>', '<?php echo _('Confirm delete Mailing List')?>', 'ml<?php echo $i?>', '<?php echo _("Following mailing list has been deleted")?>', '<?php echo _("Deleting mailing list")?>')"><i class="icon-trash"></i></a>
                                    </td>  
                                    <td onclick="openEditMlForm('<?php echo $ml->getName()?>')"><a class="ml" href="#"><?php echo $ml->getName() ?></a></td>
                                    <td class="mlcheckbox" onclick="confirmSwitchMlStatus('<?php echo $ml->getName()?>', 'ml<?php echo $i?>Status')">
                                        <img id="ml<?php echo $i?>Status" class="mlcheck" src="images/<?php echo $ml->isEnabled() ? 'enabled.png' : 'disabled.png' ?>">
                                    </td>
                                    <td><?php echo '('.$ml->getEmailCount().') '.getMailingListPreview($ml, 32) ?></td>
                                </tr>
                            <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            
                <?php //////////////////////////////////////////////// Mailing List hidden items ?>
                <div id="mledit" style="display:none;">
                    <form name="mleditform" id="mleditform" method="post" action="saveMailingListChanges.php" onsubmit="return saveMlChanges(this);">
                        <input type="hidden" name="mlName" id="mlName" value="">
                        <table>
                            <tr>
                                <td colspan="2"><h2 id="mlNameTitle">Mailing list name</h2></td>
                            </tr>
                            <tr>
                                <td class="mlfieldname"><?php echo _('Reply To')?> [<a href="#" title="<?php echo _('Indicates where the reply to a message in the mailing list should be posted to')?>" rel="tooltip">?</a>]</td>
                                <td>
                                    <div class="mlfieldname"><?php echo _('List Members Email Addresses')?></div>
                                </td>
                            </tr>
                            <tr>
                                <td id="mlreplyfield">
                                    <label class="radio">
                                        <input type="radio" name="mlReplyTo" value="s" id="mlReplyTo_s" checked="true"> <?php echo _('Sender')?>
                                    </label>
                                    <label class="radio">
                                        <input type="radio" name="mlReplyTo" value="m" id="mlReplyTo_m"> <?php echo _('Mailing list')?>
                                    </label>
                                </td>
                                <td>
                                    <textarea name="mlcontent" id="mlcontent"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="buttons">
                                        <button class="btn" type="submit" name="cancel" onclick="return discardMlChanges()"><?php echo _('Discard changes')?></button>
                                        <button class="btn" type="submit" name="save"><?php echo _('Save')?></button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <span style="display:none;" id="mlActionType"></span>
                    </form>
                </div>
            </div>
                
            <?php //////////////////////////////////////////////// Message bar ?>
            <div id="messageBar">
                <span id="running" style="visibility:hidden;">running</span><br>
                <span id="state"></span>
            </div>
            <div id="mask"></div>
        
        </div>
    </body>
</html>
