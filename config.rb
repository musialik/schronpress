# Require any additional compass plugins here.
require 'rubygems'
require 'bundler'

Bundler.require
# Other gems...

# Settings
class Theme
  attr_reader :sprockets, :production, :staging

  def initialize
    root = File.dirname(__FILE__)
    compass_gem_root = Gem.loaded_specs['compass'].full_gem_path


    ##
    # Assets

    @sprockets = Sprockets::Environment.new(root) do |env| 
      # Uncomment this line to display logger messages
      # env.logger = Logger.new(STDOUT)
    end

    @sprockets.append_path File.join('assets', 'javascripts')
    @sprockets.append_path File.join('assets', 'stylesheets')
    # This allows to import compass files
    @sprockets.append_path File.join(compass_gem_root, 'frameworks', 'compass', 'stylesheets')
    @sprockets.append_path File.join(compass_gem_root, 'frameworks', 'blueprint', 'stylesheets')
    # More paths...

    @sprockets.js_compressor  = :uglify
    @sprockets.css_compressor = :scss


    ##
    # Rsync

    @production = {
      remote_host: 'mus@otozanimalsoswiecim.pl',
      remote_path: '/home/www/otoz/wp-content/themes/schronpress/',
    }
    @staging = {
      remote_host: 'mus@dev.otozanimalsoswiecim.pl',
      remote_path: '/home/www/otoz-dev/wp-content/themes/schronpress/', 
    }
    
  end
end