# A sample Guardfile
# More info at https://github.com/guard/guard#readme

def compile m, ext
  msg = "#{m[0]} changed..."
  puts msg

  output = `rake assets:compile_#{ext}`
  
  # n "#{m[0]} changed", output
  puts output
end

guard :shell do
  watch(%r{^assets/javascripts/.+$}) { |m| compile m, :js }
  watch(%r{^assets/stylesheets/.+$}) { |m| compile m, :css }
end

guard 'livereload' do
  watch(%r{.+\.php})
  watch(%r{^assets/\w+/(.+\.(css|js|scss|coffee))$})
  # watch(%r{^style\.css$})
  # watch(%r{^javascript\.js$})
end
