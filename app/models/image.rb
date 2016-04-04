class Image < ActiveRecord::Base
  attr_accessor :upload

  def self.save_file(upload, hash)
    file_name = upload['file'].original_filename if (upload['file'] != '')
    file_data = upload['file'].read
    file_type = upload['file'].content_type

    self.create(name: file_name, url_hash: hash, image_type: file_type, image_data: file_data)
  end
end
