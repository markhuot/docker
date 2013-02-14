# Create documentation files
task :document do

  # Grab any approved source file
  Dir.glob('**/*.php').each do |f|

    # Open the file
    file = File.open(f, "rb")

    # Read the contents
    contents = file.read

    # If the file has a multiline comment
    if contents.include?('/**') then

      # Store the content of the comments
      comments = []

      # Loop over each comment
      contents.gsub(/\/\*\*.*?\*\//m) do |match|

        # Strip out any leading spaces or leading asterixs
        comments.push match.gsub(/^[[:blank:]]*(\/\*\*|\*\/|\*)[[:blank:]]*/m, '')
      end

      # Write out the file in a .md format
      File.open(f.gsub(/\.php$/, '.md'), 'w') {|f| f.write(comments.join("\r\n").strip) }
    end
  end
end