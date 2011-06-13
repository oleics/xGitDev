var xGitDev = function(config) {
    config = config || {};
    /* Grid configuration options */
    Ext.applyIf(config, {
    });
    /* Class parent constructor */
    xGitDev.superclass.constructor.call(this,config);
};
Ext.extend(xGitDev,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config:{}
});
Ext.reg('xgitdev',xGitDev);
xGitDev = new xGitDev();