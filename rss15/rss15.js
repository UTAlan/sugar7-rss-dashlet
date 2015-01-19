/*
 *  This file is part of 'RSS Feed Dashlet'.
 *
 *  'RSS Feed Dashlet' is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation.
 *
 *  'RSS Feed Dashlet' is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with 'RSS Feed Dashlet'.  If not, see http://www.gnu.org/licenses/gpl.html.
 *
 * Copyright 2015 Alan Beam - All rights reserved.
 */
({
    plugins: ['Dashlet'],
    initDashlet: function () {
        if (this.meta.config) {
            var feed_name = this.settings.get("feed_name") || "";
            this.settings.set("feed_name", feed_name);
            var feed_url = this.settings.get("feed_url") || "";
            this.settings.set("feed_url", feed_url);
        }
    },
    
    loadData: function (options) {
        var feed_name, feed_url;
        if (_.isUndefined(this.model)) {
            return;
        }
        feed_name = this.settings.get('feed_name') || '';
        feed_url = this.settings.get('feed_url') || '';
        arg='';
        purl = parent.location.href;
        baseurl = purl.substring(0,purl.indexOf('#'));

        var arg='rss15/GetFeed/?feed_url='+encodeURIComponent(feed_url);
    
        var self = this;
        app.api.call('GET', app.api.buildURL(arg), null, 
        { 
            success: function (data) {
                if (this.disposed) {
                    return;
                }          
                
                $.each(data, function(idx, obj) {
                    obj.url = baseurl;
                });
                _.extend(self, data);
                self.render();
            },
        }
        );
    },
    
})
