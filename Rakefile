require 'rubygems'
require 'bundler'
 
Bundler.require
require './config.rb'

settings = Theme.new

namespace :assets do
  desc "Compile assets"
  task compile: [:compile_js, :compile_css] do
  end

  desc "Compile javascript assets"
  task :compile_js do
    asset = settings.sprockets['javascript.js']
    asset.write_to('javascript.js')
    puts "Javascript assets compiled"
  end

  desc "Compile CSS assets"
  task :compile_css do
    asset = settings.sprockets['style.css.scss']
    asset.write_to('style.css')
    puts "CSS assets compiled"
  end
end

namespace :deploy do
  desc "Deploy to production"
  task :production do
    deploy(settings.production[:remote_host], settings.production[:remote_path])
  end

  desc "Deploy to staging"
  task :staging do
    deploy(settings.staging[:remote_host], settings.staging[:remote_path])
  end
end


def deploy(host, dest)
  exclude = ['assets/stylesheets', 'assets/javascripts', 'assets/js', 'assets/styles', 'Gemfile', 'Gemfile.lock', 'Guardfile', '.git', '.bundle', '*.rb', '.sass-cache', '*.psd', 'Rakefile', '*.xcf', 'node_modules']

  cmd = "rsync -vr --delete "
  exclude.each { |pattern| cmd += "--exclude '#{pattern}' " }
  cmd += "./ #{host}:#{dest}"

  sh cmd
end